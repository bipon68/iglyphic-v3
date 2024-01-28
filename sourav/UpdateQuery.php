<?php

namespace Sourav;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateQuery
{
    private string $table;
    private string $updatedId;
    private array $rowAll_ar = [];
    private array $updatedAll_ar = [];
    private string $message;
    private $error;

    public function __construct(string $table)
    {
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(0);

        $this->table = $table;
    }

    public function updateRow($updatedRow, $row_ar)
    {
        $this->updatedId = $updatedRow['id'];
        $this->updatedAll_ar = $updatedRow;
        $this->rowAll_ar = $row_ar;
        $this->rowAll_ar['updated_at'] = Carbon::now()->getTimestamp();

        return $this;
    }

    public function submit()
    {
        $update = DB::table($this->table)
            ->where('id', $this->updatedId)
            ->update($this->rowAll_ar);
        $this->message = $update == 1 ? "Updated" : "Not Update";
        $this->error = $update == 1 ? 0 : 1;
        if ($update == 1) {
            foreach ($this->rowAll_ar as $key => $det_Ar) {
                if ($this->updatedAll_ar[$key] != $det_Ar && $key != 'updated_at') {
                    $insert = new InsertQuery("log_history");
                    $insert->addRow([
                        'table_name' => $this->table,
                        'tId' => $this->updatedId,
                        'old_value' => ($this->updatedAll_ar[$key] ?? ""),
                        'new_value' => $det_Ar,
                        'column' => $key,
                    ]);
                    $insert->submit();

                }
            }

        }
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getError(): int
    {
        return $this->error;
    }
}

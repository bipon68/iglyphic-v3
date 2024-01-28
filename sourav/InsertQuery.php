<?php

namespace Sourav;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InsertQuery
{
    private string $table = "";
    private array $rowAll_ar = [];
    private string $message = "";
    private int $lastId;
    private int $error;

    public function __construct(string $table)
    {
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(0);

        $this->table = $table;
    }

    public function addRow(array $row_ar): void
    {
        $this->rowAll_ar = $row_ar;
        $this->rowAll_ar['created_at'] = Carbon::now()->getTimestamp();
        $this->rowAll_ar['updated_at'] = Carbon::now()->getTimestamp();
        $this->rowAll_ar['deleted_at'] = 0;
        $this->rowAll_ar['creator'] = Auth::id();

    }

    public function submit(): self
    {
        $id = DB::table($this->table)->insertGetId(
            json_decode(json_encode($this->rowAll_ar), true)
        );

        $this->lastId = $id;
        $this->message = $id > 0 ? "Success" : "Not Success";
        $this->error = $id > 0 ? 0 : 1;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function lastInsertedId(): int
    {
        return $this->lastId;
    }

    public function getError(): int
    {
        return $this->error;
    }

}

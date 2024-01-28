<?php

namespace Sourav;

use Illuminate\Support\Facades\DB;

class SelectQuery
{
    private string $table;
    private bool $isDeleted = false;
    private array $resultsAr = [];

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function getDeletedColumn($isDel = false)
    {
        $this->isDeleted = $isDel;
    }

    public function setQuery($query)
    {

        if (!$this->isDeleted) {

            $query = str_replace("where", "where `deleted_at`=0 AND ", $query);
            $query = str_replace("WHERE", "where `deleted_at`=0 AND ", $query);
        }
        //DB::select('select * from users where id = ?', [1]);
        $results = DB::select($query);
        $this->resultsAr = json_decode(json_encode($results), true);
        return $this;
    }


    public function getQueue($key = 0)
    {

        if (count($this->resultsAr) > 0 && $this->resultsAr !==null) {

            return $this->resultsAr[$key];
        }
        return null;

    }

    public function getQueues($keyCol = null): array
    {
        $result_all_ar = $this->resultsAr;
        if ($keyCol !== null) {
            $resultAllAr = [];
            foreach ($this->resultsAr ?: [] as $row_ar) {
                $resultAllAr[$row_ar[$keyCol]] = $row_ar;
            }
            $result_all_ar = $resultAllAr;
        }
        return $result_all_ar;
    }

    public function getGroupQueues(string $groupCol, string $keyCol = null): array
    {
        $resultAllAr = [];
        foreach ($this->resultsAr as $row_ar) {
            if ($keyCol === null)
                $resultAllAr[$row_ar[$groupCol]][] = $row_ar;
            else
                $resultAllAr[$row_ar[$groupCol]][$row_ar[$keyCol]] = $row_ar;
        }
        return $resultAllAr;
    }

    public function getColumnValues(string $keyCol, bool $isFilter = true): array
    {
        $resultAllAr = [];
        if ($keyCol !== null) {
            $resultAllAr = [];
            foreach ($this->resultsAr as $row_ar) {
                $resultAllAr[$row_ar[$keyCol]] = $row_ar[$keyCol];
            }
        }

        if ($isFilter) {
            return array_filter($resultAllAr);
        } else {
            return $resultAllAr;
        }
    }
    public function getColumnValues2(string $keyCol, bool $isFilter = true): array
    {
        $resultAllAr = [];
        if ($keyCol !== null) {
            $resultAllAr = [];
            foreach ($this->resultsAr as $row_ar) {
                $resultAllAr[$row_ar[$keyCol]] = "'" . $row_ar[$keyCol] . "'";;
            }
        }

        if ($isFilter) {
            return array_filter($resultAllAr);
        } else {
            return $resultAllAr;
        }
    }

}

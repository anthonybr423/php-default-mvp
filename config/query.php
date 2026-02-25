<?php

namespace Core;

require_once(dirname(__DIR__) . "/config/connection.php");

use PDO;

abstract class Model
{
    protected string $table;
    protected string|array $columns = ['*'];
    protected array $wheres = [];
    protected array $bindings = [];
    protected array $orderBy = [];
    protected array $groupBy = [];
    protected ?int $limit = null;
    protected ?int $offset = null;

    public function where(string $column, $operator = null, $value = null): static
    {
        if ($value === null && $operator !== null) {
            $value = $operator;
            $operator = '=';
        }

        if ($operator === null && $value === null) {
            $this->wheres[] = $column;
            return $this;
        }

        $this->wheres[] = [$column, $operator, $value];
        return $this;
    }

    public function orderBy(string $column, string $order = 'ASC'): static
    {
        $this->orderBy[] = "$column $order";
        return $this;
    }

    public function groupBy(string|array $column = ['*']): static
    {
        $this->groupBy[] = is_array($column) ? $column : [$column];
        return $this;
    }

    public function limit(int $limit): static
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): static
    {
        $this->offset = $offset;
        return $this;
    }
    public function select(string|array $columns = ['*']): static
    {
        $this->columns = $columns;
        return $this;
    }

    private function buildQuery(): string
    {
        $cols = implode(", ", is_array($this->columns) ? $this->columns : [$this->columns]);
        $sql = "SELECT $cols FROM {$this->table}";

        if (!empty($this->wheres)) {
            $conditions = [];
            foreach ($this->wheres as $where) {
                if (is_array($where)) {
                    [$column, $operator, $value] = $where;
                    $conditions[] = "$column $operator ?";
                    $this->bindings[] = $value;
                } else {
                    $conditions[] = $where;
                }
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        if (!empty($this->orderBy)) {
            $sql .= " ORDER BY " . implode(", ", $this->orderBy);
        }

        if (!empty($this->groupBy)) {
            $sql .= " GROUP BY " . implode(", ", $this->groupBy);
        }

        if ($this->limit !== null) {
            $sql .= " LIMIT " . $this->limit;
        }

        if ($this->offset !== null) {
            $sql .= " OFFSET " . $this->offset;
        }

        return $sql;
    }

    public function all(): array{
        $this->bindings = [];
        $sql = $this->buildQuery();
        $stmt = getConnection()->prepare($sql);
        $stmt->execute($this->bindings);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first(): ?array{
        $this->limit = 1;
        $results = $this->all();
        return $results[0] ?? null;
    }

    public function find(int $id): ?array{
        return $this->where("id", $id)->first();
    }

    public function raw(string $sql): array{
        $stmt = getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

<?php


class UserModel extends Model
{
    var $table = 'b010user';

    public function findAll()
    {

        $sql = "SELECT * FROM {$this->table}";

        return $this->query($sql);
    }

    public function findUserById($id = 0)
    {

        $id = $this->escapeString(trim($id));

        $sql = "SELECT * FROM {$this->table} ";
        $sql .= "WHERE B010UserCd = {$id}";

        $result = $this->query($sql, 'assoc');

        if ($result) {
            return $result[0];
        }

        return NULL;
    }

    public function findUsersByName($name = '')
    {

        $name = $this->escapeString(trim($name));

        $sql = "SELECT * FROM {$this->table} ";
        $sql .= "WHERE B010UserNm LIKE '%{$name}%'  ";
        $sql .= "ORDER BY B010UserNm ASC";

        return $this->query($sql);

    }

    public function insert($data)
    {

        $sql = "INSERT INTO {$this->table} SET ";
        $sql .= "B010UserNm = '{$data["B010UserNm"]}',";
        $sql .= "B010Email  = '{$data["B010Email"]}',";
        $sql .= "B010Level  = '{$data["B010Level"]}',";
        $sql .= "B010Status = '{$data["B010Status"]}',";
        $sql .= "B010CreDt  = now()";

        if ($this->execute($sql) == TRUE) {
            return $this->getLastInsertedId();
        }

        return FALSE;
    }

    public function update($data)
    {
        $sql = "UPDATE {$this->table} SET ";
        $sql .= "B010UserNm = '{$data["B010UserNm"]}',";
        $sql .= "B010Email  = '{$data["B010Email"]}',";
        $sql .= "B010Level  = '{$data["B010Level"]}',";
        $sql .= "B010Status = '{$data["B010Status"]}' ";
        $sql .= "WHERE B010UserCd = {$data["B010UserCd"]}";

        if ($this->execute($sql) == TRUE) {
            return TRUE;
        }

        return FALSE;
    }

    public function delete($id)
    {
        if (!$id) {
            return FALSE;
        }

        $sql = "DELETE FROM {$this->table} ";
        $sql .= "WHERE B010UserCd = {$id}";

        if ($this->execute($sql) == TRUE) {
            return TRUE;
        }

        return FALSE;
    }
}
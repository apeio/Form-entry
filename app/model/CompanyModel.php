<?php


class CompanyModel extends Model
{
    var $table = 'b010company';

    public function findAll()
    {

        $sql = "SELECT * FROM {$this->table}";

        return $this->query($sql);
    }

    public function findCompanyById($id = 0)
    {

        $id = $this->escapeString(trim($id));

        $sql = "SELECT * FROM {$this->table} ";
        $sql .= "WHERE B010CompanyCd = {$id}";

        $result = $this->query($sql, 'assoc');

        if ($result) {
            return $result[0];
        }

        return NULL;
    }

    public function findCompaniesByName($name = '')
    {

        $name = $this->escapeString(trim($name));

        $sql = "SELECT * FROM {$this->table} ";
        $sql .= "WHERE B010CompanyNm LIKE '%{$name}%'  ";
        $sql .= "ORDER BY B010CompanyNm ASC";

        return $this->query($sql);

    }

    public function insert($data)
    {

        $sql = "INSERT INTO {$this->table} SET ";
        $sql .= "B010CompanyNm = '{$data["B010CompanyNm"]}',";
        $sql .= "B010CompanyAddr  = '{$data["B010CompanyAddr"]}',";
        $sql .= "B010CompanyEmail  = '{$data["B010CompanyEmail"]}',";
        $sql .= "B010CompanyTel = '{$data["B010CompanyTel"]}',";
        $sql .= "B010CreDt  = now()";

        if ($this->execute($sql) == TRUE) {
            return $this->getLastInsertedId();
        }

        return FALSE;
    }

    public function update($data)
    {
        $sql = "UPDATE {$this->table} SET ";
        $sql .= "B010CompanyNm = '{$data["B010CompanyNm_0"]}',";
        $sql .= "B010CompanyAddr  = '{$data["B010CompanyAddr_0"]}',";
        $sql .= "B010CompanyEmail  = '{$data["B010CompanyEmail_0"]}',";
        $sql .= "B010CompanyTel = '{$data["B010CompanyTel_0"]}' ";
        $sql .= "WHERE B010CompanyCd = {$data["B010CompanyCd_0"]}";

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
        $sql .= "WHERE B010CompanyCd = {$id}";

        if ($this->execute($sql) == TRUE) {
            return TRUE;
        }

        return FALSE;
    }
}
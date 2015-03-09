<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 02/03/2015
 * Time: 23:16
 */

class Validation {

    /**
     * @param $suggestion
     * @param $city
     * @return bool
     */
    protected function equalsTo($city, $suggestion){
        $suggestion = $this->clearWord($suggestion);
        $city = $this->clearWord($city);
        if($suggestion == $city){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $city
     * @param $suggestion
     * @return bool
     */
    protected function groupOfLetter($city, $suggestion){

        $stringParts = str_split($suggestion);
        sort($stringParts);
        $suggestion = implode('', $stringParts);

        $stringParts1 = str_split($city);
        sort($stringParts1);
        $city = implode('', $stringParts1);

        $suggestion = $this->clearWord($suggestion);
        $city = $this->clearWord($city);

        if($suggestion == $city){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $suggestion
     * @param $city
     * @return bool
     */
    protected function removingLetters($city, $suggestion){

        $suggestion = strtr(substr($suggestion, 0, -2), "-", "");

        $suggestion = $this->clearWord($suggestion);
        $city = $this->clearWord($city);

        if($suggestion == $city){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $word
     * @return string
     */
    protected function clearWord($word){
        $word = strtr($word, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
        $word = strtolower(trim($word));
        return $word;
    }

    /**
     * @param array $suggestion
     * @param array $cities
     * @return array
     */
    public function run(array $suggestion, array $cities) {
        $resultCity["ID"] = null;
        $resultCity["name"] = null;
        $resultCity["acronym"] = null;
        foreach ($cities as $city){

            $validation1 = $this->equalsTo($city["name"], $suggestion["name"]);
            $validation2 = $this->groupOfLetter($city["name"], $suggestion["name"]);
            $validation3 = $this->removingLetters($city["name"], $suggestion["name"]);
            /* Se eu tivesse mais tempo poderia criar muitas outras validações*/

            if($validation1 == true || $validation2 == true || $validation3 == true){
                $resultCity["ID"] = $city["ID"];
                $resultCity["name"] = $city["name"];
                $resultCity["acronym"] = $city["acronym"];
                break;
            }
        }

        if($resultCity["ID"] != null){
            return $result = [
                $suggestion["ID"],      // suggestionId
                $suggestion["name"],    // suggestionName
                $resultCity["ID"],      // officialId
                $resultCity["name"],    // officialName
                $resultCity["acronym"]  // officialAcronym
            ];

        }else{
            return false;
        }

    }
}
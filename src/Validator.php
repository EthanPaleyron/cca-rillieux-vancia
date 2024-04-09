<?php

namespace Project;

/** Class Validator **/
class Validator
{

    private $data;
    private $errors = [];

    private $messages = [
        "required" => "Ce champ est requis!",
        "min" => "Ce champ doit contenir plus de %^% lettres!",
        "max" => "Ce champ doit contenir moins de %^% lettres!",
        "length" => "Ce champ doit contenir %^% caractère(s)!",
        "regex" => "Ce format n'est pas respecté",
        "url" => "Ce champ doit correspondre à une url!",
        "email" => "Ce champ doit correspondre à une email: exemple@gmail.com!",
        "date" => "Ce champ doit être une date!",
        "time" => "Ce champ doit être une du temps en heures, minutes et secondes!",
        "alpha" => "Ce champ peut contenir que des lettres minuscules et majuscules!",
        "alphaNum" => "Ce champ peut contenir que des lettres minuscules, majuscules et des chiffres!",
        "alphaNumDash" => "Ce champ peut contenir que des lettres minuscules, majuscules, des chiffres, des slashs et des tirets!",
        "alphaSpace" => "Ce champ peut contenir que des lettres minuscules, majuscules, espace",
        "alphaSpaceLinefeed" => "Ce champ peut contenir que des lettres minuscules, majuscules, espace et saut de ligne",
        "numeric" => "Ce champ peut contenir que des chiffres!",
        "confirm" => "Ce champs n'est pas conforme au confirm!"
    ];
    private $rules = [
        "required" => "#^.+$#m",
        "min" => "#^.{ù,}$#m",
        "max" => "#^.{0,ù}$#m",
        "length" => "#^.{ù}$#m",
        "regex" => "ù",
        "url" => FILTER_VALIDATE_URL,
        "email" => FILTER_VALIDATE_EMAIL,
        "date" => "#^(\d{4})(\/|-)(0[0-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1])$#",
        "alpha" => "#^[A-z]+$#m",
        "alphaNum" => "#^[A-z0-9]+$#m",
        "alphaNumDash" => "#^[A-z0-9-\|]+$#m",
        "alphaSpace" => "#^[A-z À-ú]+$#m",
        "alphaSpaceLinefeed" => "#^[A-z À-ú\n]+$#m",
        "numeric" => "#^[0-9]+$#",
        "confirm" => ""
    ];
    public function __construct($data = [])
    {
        $this->data = $data ?: $_POST;
    }
    public function validate($array)
    {
        foreach ($array as $field => $rules) {
            $this->validateField($field, $rules);
        }
    }
    public function validateField($field, $rules)
    {
        foreach ($rules as $rule) {
            $this->validateRule($field, $rule);
        }
    }
    public function validateRule($field, $rule)
    {
        $repRule = explode(":", $rule);
        $messageKey = $repRule[0];
        $ruleParams = isset($repRule[1]) ? $repRule[1] : null;

        switch ($messageKey) {
            case 'confirm':
                if (!isset($this->data[$field . 'Confirm']) || $this->data[$field] != $this->data[$field . 'Confirm']) {
                    $this->errors = [$this->messages[$messageKey]];
                    $this->storeSession('confirm', $this->messages[$messageKey]);
                }
                return;

            case 'email':
            case 'url':
                if (!filter_var($this->data[$field], $this->rules[$messageKey])) {
                    $this->errors = [$this->messages[$messageKey]];
                    $this->storeSession($field, $this->messages[$messageKey]);
                }
                return;

            default:
                $ruleToUse = $this->rules[$messageKey];
                if ($ruleParams !== null) {
                    $ruleToUse = str_replace("ù", $ruleParams, $ruleToUse);
                }

                if (!preg_match($ruleToUse, $this->data[$field])) {
                    $this->errors = [$this->messages[$messageKey]];
                    $this->storeSession($field, str_replace("%^%", $ruleParams, $this->messages[$messageKey]));
                }
                return;
        }
    }
    public function errors()
    {
        return $this->errors;
    }

    public function storeSession($field, $error)
    {
        if (!isset($_SESSION["error"][$field])) {
            $_SESSION["error"][$field] = $error;
        } else {
            return;
        }
    }
}
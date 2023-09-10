<?php

class CodeError
{
  public const INVALID_CREDENTIALS = 1;
  public const LOGIN_FIELDS_REQUIRED = 2;
  public const PASSWORD_FIELDS_REQUIRED = 3;

  public static function getErrorMessage(int $errorCode): string
  {
    switch ($errorCode) {
      case self::INVALID_CREDENTIALS:
        $result = "Les identifiants fournis n'ont pas permis de vous identifier";
        break;
      case self::LOGIN_FIELDS_REQUIRED:
        $result = "Le login est faux ou n'existe pas";
        break;
      case self::PASSWORD_FIELDS_REQUIRED:
        $result = "Tous les champs du formulaire sont obligatoires";
        break;
      default:
        $result = "Une erreur est survenue";
    }

    return $result;
  }
}

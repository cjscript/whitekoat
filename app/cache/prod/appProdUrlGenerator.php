<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'actc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ActionLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/actc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'actc_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ActionLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/actc/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'actc_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ActionLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/actc/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'alic_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\AliasLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/alic/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'alic_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\AliasLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/alic/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'alic_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\AliasLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/alic/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'clc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ClassLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/clc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'clc_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ClassLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/clc/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'clc_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ClassLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/clc/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'disease_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::showGenericDiseasePopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/discard/diseasepup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'disease_card_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/discard/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'disease_card_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/discard/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'disease_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/discard/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dislc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dislc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dislc_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dislc/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dislc_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dislc/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showGenericDrugPopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/drugpup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drugdisease_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugDiseasePopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/drdispup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_class_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugClassPopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/dcpup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_target_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugTargetPopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/tgtpup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_treatment_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugTreatmentPopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/ttmtpup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_sideeffect_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugSideEffectPopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/seffpup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_contraind_popup_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showContraIndicationPopup',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/cindpup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_card_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_card_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'drug_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dcard/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dlc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dlc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dlc_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dlc/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'dlc_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dlc/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'img_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImageUploadController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/imgtagg',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'image_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImageUploadController::saveImageLibTagAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/imgtagsv',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'import_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImportDrugDataController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dimpc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'import_route_upload' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImportDrugDataController::uploadAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/dimpc/u',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login_route' => array (  0 =>   array (  ),  1 =>   array (    'name' => 'someDefaultName',    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout_route' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\LoginController::logoutAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'signup_route' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\LoginController::signupAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/signup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'mlc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\MoleculeLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/mlc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'mlc_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\MoleculeLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/mlc/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'mlc_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\MoleculeLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/mlc/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::retrieveSearchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/sc/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sc_help_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::helpAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/sc/help',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sc_drug_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::doSearch',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/sc/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sc_card_route_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::searchCardAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/sc/card',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'symlc_route_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\SymptomLibController::retrieveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/symc/g',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'symlc_route_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\SymptomLibController::saveAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/symc/s',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'symlc_route_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\SymptomLibController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/symc/r',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}

<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // whitekoat_default
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'whitekoat_default');
            }

            return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\loginController::loginAction',  '_route' => 'whitekoat_default',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/actc')) {
                // actc_route_get
                if ($pathinfo === '/actc/g') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ActionLibController::retrieveAction',  '_route' => 'actc_route_get',);
                }

                // actc_route_save
                if ($pathinfo === '/actc/s') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_actc_route_save;
                    }

                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ActionLibController::saveAction',  '_route' => 'actc_route_save',);
                }
                not_actc_route_save:

                // actc_route_remove
                if ($pathinfo === '/actc/r') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ActionLibController::removeAction',  '_route' => 'actc_route_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/alic')) {
                // alic_route_get
                if ($pathinfo === '/alic/g') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\AliasLibController::retrieveAction',  '_route' => 'alic_route_get',);
                }

                // alic_route_save
                if ($pathinfo === '/alic/s') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_alic_route_save;
                    }

                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\AliasLibController::saveAction',  '_route' => 'alic_route_save',);
                }
                not_alic_route_save:

                // alic_route_remove
                if ($pathinfo === '/alic/r') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\AliasLibController::removeAction',  '_route' => 'alic_route_remove',);
                }

            }

        }

        // homepage_search
        if (rtrim($pathinfo, '/') === '/search') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage_search');
            }

            return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\CardViewController::doSearch',  '_route' => 'homepage_search',);
        }

        if (0 === strpos($pathinfo, '/clc')) {
            // clc_route_get
            if ($pathinfo === '/clc/g') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ClassLibController::retrieveAction',  '_route' => 'clc_route_get',);
            }

            // clc_route_save
            if ($pathinfo === '/clc/s') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_clc_route_save;
                }

                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ClassLibController::saveAction',  '_route' => 'clc_route_save',);
            }
            not_clc_route_save:

            // clc_route_remove
            if ($pathinfo === '/clc/r') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ClassLibController::removeAction',  '_route' => 'clc_route_remove',);
            }

        }

        if (0 === strpos($pathinfo, '/d')) {
            if (0 === strpos($pathinfo, '/dis')) {
                if (0 === strpos($pathinfo, '/discard')) {
                    // disease_popup_route_get
                    if ($pathinfo === '/discard/diseasepup') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::showGenericDiseasePopup',  '_route' => 'disease_popup_route_get',);
                    }

                    // disease_card_route_get
                    if ($pathinfo === '/discard/g') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::retrieveAction',  '_route' => 'disease_card_route_get',);
                    }

                    // disease_card_route_save
                    if ($pathinfo === '/discard/s') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_disease_card_route_save;
                        }

                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::saveAction',  '_route' => 'disease_card_route_save',);
                    }
                    not_disease_card_route_save:

                    // disease_route_remove
                    if ($pathinfo === '/discard/r') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseCardController::removeAction',  '_route' => 'disease_route_remove',);
                    }

                }

                if (0 === strpos($pathinfo, '/dislc')) {
                    // dislc_route_get
                    if ($pathinfo === '/dislc/g') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseLibController::retrieveAction',  '_route' => 'dislc_route_get',);
                    }

                    // dislc_route_save
                    if ($pathinfo === '/dislc/s') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_dislc_route_save;
                        }

                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseLibController::saveAction',  '_route' => 'dislc_route_save',);
                    }
                    not_dislc_route_save:

                    // dislc_route_remove
                    if ($pathinfo === '/dislc/r') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DiseaseLibController::removeAction',  '_route' => 'dislc_route_remove',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/dcard')) {
                if (0 === strpos($pathinfo, '/dcard/d')) {
                    if (0 === strpos($pathinfo, '/dcard/dr')) {
                        // drug_popup_route_get
                        if ($pathinfo === '/dcard/drugpup') {
                            return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showGenericDrugPopup',  '_route' => 'drug_popup_route_get',);
                        }

                        // drugdisease_popup_route_get
                        if ($pathinfo === '/dcard/drdispup') {
                            return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugDiseasePopup',  '_route' => 'drugdisease_popup_route_get',);
                        }

                    }

                    // drug_class_popup_route_get
                    if ($pathinfo === '/dcard/dcpup') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugClassPopup',  '_route' => 'drug_class_popup_route_get',);
                    }

                }

                if (0 === strpos($pathinfo, '/dcard/t')) {
                    // drug_target_popup_route_get
                    if ($pathinfo === '/dcard/tgtpup') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugTargetPopup',  '_route' => 'drug_target_popup_route_get',);
                    }

                    // drug_treatment_popup_route_get
                    if ($pathinfo === '/dcard/ttmtpup') {
                        return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugTreatmentPopup',  '_route' => 'drug_treatment_popup_route_get',);
                    }

                }

                // drug_sideeffect_popup_route_get
                if ($pathinfo === '/dcard/seffpup') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showDrugSideEffectPopup',  '_route' => 'drug_sideeffect_popup_route_get',);
                }

                // drug_contraind_popup_route_get
                if ($pathinfo === '/dcard/cindpup') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::showContraIndicationPopup',  '_route' => 'drug_contraind_popup_route_get',);
                }

                // drug_card_route_get
                if ($pathinfo === '/dcard/g') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::retrieveAction',  '_route' => 'drug_card_route_get',);
                }

                // drug_card_route_save
                if ($pathinfo === '/dcard/s') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_drug_card_route_save;
                    }

                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::saveAction',  '_route' => 'drug_card_route_save',);
                }
                not_drug_card_route_save:

                // drug_route_remove
                if ($pathinfo === '/dcard/r') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugCardController::removeAction',  '_route' => 'drug_route_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/dlc')) {
                // dlc_route_get
                if ($pathinfo === '/dlc/g') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugLibController::retrieveAction',  '_route' => 'dlc_route_get',);
                }

                // dlc_route_save
                if ($pathinfo === '/dlc/s') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_dlc_route_save;
                    }

                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugLibController::saveAction',  '_route' => 'dlc_route_save',);
                }
                not_dlc_route_save:

                // dlc_route_remove
                if ($pathinfo === '/dlc/r') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\DrugLibController::removeAction',  '_route' => 'dlc_route_remove',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/home')) {
            // homepage_route_get
            if ($pathinfo === '/home') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::retrieveSearchAction',  '_route' => 'homepage_route_get',);
            }

            // homepage_autocomplete
            if (rtrim($pathinfo, '/') === '/home/autocomplete') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage_autocomplete');
                }

                return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::getAutocompleteResults',  '_route' => 'homepage_autocomplete',);
            }

            // homepage_namedCard
            if (rtrim($pathinfo, '/') === '/home/cardByName') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage_namedCard');
                }

                return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::addCardByName',  '_route' => 'homepage_namedCard',);
            }

            if (0 === strpos($pathinfo, '/home/d')) {
                // homepage_drugCard
                if (rtrim($pathinfo, '/') === '/home/drugCard') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'homepage_drugCard');
                    }

                    return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::renderDrugCard',  '_route' => 'homepage_drugCard',);
                }

                // homepage_diseaseCard
                if (rtrim($pathinfo, '/') === '/home/diseaseCard') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'homepage_diseaseCard');
                    }

                    return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::renderDiseaseCard',  '_route' => 'homepage_diseaseCard',);
                }

            }

            // homepage_resultsCard
            if (rtrim($pathinfo, '/') === '/home/resultsCard') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage_resultsCard');
                }

                return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::renderResultsCard',  '_route' => 'homepage_resultsCard',);
            }

            // homepage_valueCard
            if (rtrim($pathinfo, '/') === '/home/libValueCard') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage_valueCard');
                }

                return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::renderLibValueCard',  '_route' => 'homepage_valueCard',);
            }

            // homepage_imageCard
            if (rtrim($pathinfo, '/') === '/home/imageCard') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage_imageCard');
                }

                return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::renderImageCard',  '_route' => 'homepage_imageCard',);
            }

            // homepage_libValDesc
            if (rtrim($pathinfo, '/') === '/home/libValueDescription') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'homepage_libValDesc');
                }

                return array (  '_format' => 'json',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\HomepageController::getLibValueDescriptionById',  '_route' => 'homepage_libValDesc',);
            }

        }

        if (0 === strpos($pathinfo, '/imgtag')) {
            // img_route_get
            if ($pathinfo === '/imgtagg') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImageUploadController::retrieveAction',  '_route' => 'img_route_get',);
            }

            // image_route_save
            if ($pathinfo === '/imgtagsv') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_image_route_save;
                }

                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImageUploadController::saveImageLibTagAction',  '_route' => 'image_route_save',);
            }
            not_image_route_save:

        }

        if (0 === strpos($pathinfo, '/dimpc')) {
            // import_route_get
            if ($pathinfo === '/dimpc/g') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImportDrugDataController::retrieveAction',  '_route' => 'import_route_get',);
            }

            // import_route_upload
            if ($pathinfo === '/dimpc/u') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_import_route_upload;
                }

                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\ImportDrugDataController::uploadAction',  '_route' => 'import_route_upload',);
            }
            not_import_route_upload:

        }

        if (0 === strpos($pathinfo, '/log')) {
            // login_route
            if ($pathinfo === '/login') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_login_route;
                }

                return array (  'name' => 'someDefaultName',  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\LoginController::loginAction',  '_route' => 'login_route',);
            }
            not_login_route:

            // logout_route
            if ($pathinfo === '/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_logout_route;
                }

                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\LoginController::logoutAction',  '_route' => 'logout_route',);
            }
            not_logout_route:

        }

        // signup_route
        if ($pathinfo === '/signup') {
            return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\LoginController::signupAction',  '_route' => 'signup_route',);
        }

        if (0 === strpos($pathinfo, '/mlc')) {
            // mlc_route_get
            if ($pathinfo === '/mlc/g') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\MoleculeLibController::retrieveAction',  '_route' => 'mlc_route_get',);
            }

            // mlc_route_save
            if ($pathinfo === '/mlc/s') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_mlc_route_save;
                }

                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\MoleculeLibController::saveAction',  '_route' => 'mlc_route_save',);
            }
            not_mlc_route_save:

            // mlc_route_remove
            if ($pathinfo === '/mlc/r') {
                return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\MoleculeLibController::removeAction',  '_route' => 'mlc_route_remove',);
            }

        }

        if (0 === strpos($pathinfo, '/s')) {
            if (0 === strpos($pathinfo, '/sc')) {
                // sc_route_get
                if (rtrim($pathinfo, '/') === '/sc') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sc_route_get');
                    }

                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::retrieveSearchAction',  '_route' => 'sc_route_get',);
                }

                // sc_drug_search
                if ($pathinfo === '/sc/search') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::doSearch',  '_route' => 'sc_drug_search',);
                }

                // sc_card_route_search
                if ($pathinfo === '/sc/card') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\StudentController::searchCardAction',  '_route' => 'sc_card_route_search',);
                }

            }

            if (0 === strpos($pathinfo, '/symc')) {
                // symlc_route_get
                if ($pathinfo === '/symc/g') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\SymptomLibController::retrieveAction',  '_route' => 'symlc_route_get',);
                }

                // symlc_route_save
                if ($pathinfo === '/symc/s') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_symlc_route_save;
                    }

                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\SymptomLibController::saveAction',  '_route' => 'symlc_route_save',);
                }
                not_symlc_route_save:

                // symlc_route_remove
                if ($pathinfo === '/symc/r') {
                    return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\SymptomLibController::removeAction',  '_route' => 'symlc_route_remove',);
                }

            }

        }

        // axonmedicine_whitekoat_test_index
        if (rtrim($pathinfo, '/') === '/test') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'axonmedicine_whitekoat_test_index');
            }

            return array (  '_controller' => 'AxonMedicine\\WhiteKoatBundle\\Controller\\TestController::indexAction',  '_route' => 'axonmedicine_whitekoat_test_index',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

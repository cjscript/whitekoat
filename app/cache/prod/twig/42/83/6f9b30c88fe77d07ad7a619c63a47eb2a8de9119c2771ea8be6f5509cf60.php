<?php

/* AxonMedicineWhiteKoatBundle:Default:disease.card.html.twig */
class __TwigTemplate_42836f9b30c88fe77d07ad7a619c63a47eb2a8de9119c2771ea8be6f5509cf60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:home.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:home.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_libcontent($context, array $blocks = array())
    {
        // line 4
        echo "
<div id=\"someclass\">
    <form method=\"POST\" action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("drug_card_route_save");
        echo "\" data-validate=\"parsley\">

        <fieldset id=\"drugrelationships\">
            <legend>Disease Characteristics</legend>
        </fieldset>


        <div style=\"padding-top:30px\">
            <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Add Disease Card\">
        </div>

    </form>
</div>

<table class=\"table table-striped \">
    <thead>
        <tr>
            <th>Disease Name</th>
            <th>Disease Type(s)</th>
            <th>Disease Cause(s)</th>
            <th>Disease Symptom(s)</th>
            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diseasecards"]) ? $context["diseasecards"] : $this->getContext($context, "diseasecards")));
        foreach ($context['_seq'] as $context["_key"] => $context["diseasecard"]) {
            // line 33
            echo "        <tr >
            <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasename"), "html", null, true);
            echo "</td>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasetype"), "html", null, true);
            echo "</td>
            <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasecause"), "html", null, true);
            echo "</td>
            <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasesymptom"), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("drug_route_remove", array("id" => $this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diseasecard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "    </tbody>
</table>


";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:disease.card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 41,  87 => 38,  83 => 37,  79 => 36,  75 => 35,  71 => 34,  68 => 33,  64 => 32,  35 => 6,  31 => 4,  28 => 3,);
    }
}

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
            <th>Disease Treatment(s)</th>



            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 32
        // line 33














        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diseasecards"]) ? $context["diseasecards"] : $this->getContext($context, "diseasecards")));
        foreach ($context['_seq'] as $context["_key"] => $context["diseasecard"]) {
            // line 33
            echo "\t\t\t\t<tr >
\t\t\t\t\t<td>";
            // line 34
            echo "        <tr>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasename"), "name"), "html", null, true);
            echo "</td>
\t\t\t\t\t<td>";
            // line 35
            <td>";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasetype"));
            foreach ($context['_seq'] as $context["_key"] => $context["lib"]) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lib"]) ? $context["lib"] : $this->getContext($context, "lib")), "name"), "html", null, true);
                echo "<br>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lib'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
\t\t\t\t\t<td>";
            // line 36
            <td>";
            // line 37




            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasecause"));
            foreach ($context['_seq'] as $context["_key"] => $context["lib"]) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lib"]) ? $context["lib"] : $this->getContext($context, "lib")), "name"), "html", null, true);
                echo "<br>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lib'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
\t\t\t\t\t<td>";
            // line 37
            <td>";
            // line 38




            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasesymptom"));
            foreach ($context['_seq'] as $context["_key"] => $context["lib"]) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lib"]) ? $context["lib"] : $this->getContext($context, "lib")), "name"), "html", null, true);
                echo "<br>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lib'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
\t\t\t\t\t<td><a href=\"";
            // line 38
            <td>";
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "diseasetreatment"));
            foreach ($context['_seq'] as $context["_key"] => $context["lib"]) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lib"]) ? $context["lib"] : $this->getContext($context, "lib")), "name"), "html", null, true);
                echo "<br>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lib'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</td>
            <td><a href=\"";
            // line 40







            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("drug_route_remove", array("id" => $this->getAttribute((isset($context["diseasecard"]) ? $context["diseasecard"] : $this->getContext($context, "diseasecard")), "id"))), "html", null, true);
            echo "\">remove</a>
\t\t\t\t</tr>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diseasecard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        // line 43



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
        return array (  120 => 41,  111 => 38,  99 => 37,  87 => 36,  75 => 35,  71 => 34,  68 => 33,  64 => 32,  35 => 6,  31 => 4,  28 => 3,);
        return array (  133 => 43,  124 => 40,  112 => 39,  100 => 38,  88 => 37,  76 => 36,  72 => 35,  69 => 34,  65 => 33,  35 => 6,  31 => 4,  28 => 3,);



    }
}

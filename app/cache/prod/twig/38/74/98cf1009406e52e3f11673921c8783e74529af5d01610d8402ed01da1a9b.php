<?php

/* AxonMedicineWhiteKoatBundle:Default:drug.lib.html.twig */
class __TwigTemplate_387498cf1009406e52e3f11673921c8783e74529af5d01610d8402ed01da1a9b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:home.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
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
<form method=\"POST\" action=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("dlc_route_save");
        echo "\" data-validate=\"parsley\">

    <fieldset id=\"druglib\">
        <legend>Drug Library Item</legend>

        <div style=\"padding-bottom:15px\">
            <input style=\"width:200px\" type=\"text\" id=\"itemname\" name=\"itemname\" placeholder=\"Item Name\" data-trigger=\"change\" data-required=\"true\">
        </div>
        <div style=\"padding-bottom:15px; padding-left:2px\">
            <textarea style=\"width: 400px; height: 50px;\" id=\"itemdescription\" name=\"itemdescription\" placeholder=\"Drug Description\"></textarea>
        </div>
        <div style=\"padding-bottom:20px\">
            <label class=\"checkbox\">
                <input type=\"checkbox\" name=\"isgeneric\" id=\"isgeneric\">Check if generic
            </label>
        </div>

        <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Add Drug\">
    </fieldset>
</form>


";
    }

    // line 29
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 30
        echo "
<!--<div id=\"\" class=\"form-inline\" role=\"grid\">
    <div class=\"row\">
        <div class=\"span8\">
        </div>
        <div class=\"span4\">
            <div class=\"dataTables_filter\" id=\"example_filter\">
                <label>Search: <input type=\"text\" class=\"search-query\"></label>
            </div>
        </div>
    </div>
</div>
-->

<table class=\"table table-striped \">
    <thead>
        <tr>
            <th>Drug Name</th>
            <th>Description</th>
            <th>Is Generic?</th>
            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugs"]) ? $context["drugs"] : $this->getContext($context, "drugs")));
        foreach ($context['_seq'] as $context["_key"] => $context["drug"]) {
            // line 56
            echo "        <tr >
            <td>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "name"), "html", null, true);
            echo "</td>
            <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "description"), "html", null, true);
            echo "</td>
            <td>";
            // line 59
            echo (($this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "generic")) ? ("Yes") : ("No"));
            echo "</td>
            <td><a href=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dlc_route_remove", array("id" => $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drug'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:drug.lib.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 63,  111 => 60,  107 => 59,  103 => 58,  99 => 57,  96 => 56,  92 => 55,  65 => 30,  62 => 29,  35 => 5,  32 => 4,  29 => 3,);
    }
}

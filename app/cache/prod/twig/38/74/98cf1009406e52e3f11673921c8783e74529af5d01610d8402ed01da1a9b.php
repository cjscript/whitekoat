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

</form>


";
    }

    // line 26
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 27
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
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugs"]) ? $context["drugs"] : $this->getContext($context, "drugs")));
        foreach ($context['_seq'] as $context["_key"] => $context["drug"]) {
            // line 53
            echo "        <tr >
            <td>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "name"), "html", null, true);
            echo "</td>
            <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "description"), "html", null, true);
            echo "</td>
            <td>";
            // line 56
            echo (($this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "generic")) ? ("Yes") : ("No"));
            echo "</td>
            <td><a href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dlc_route_remove", array("id" => $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drug'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
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
        return array (  117 => 60,  108 => 57,  104 => 56,  100 => 55,  96 => 54,  93 => 53,  89 => 52,  62 => 27,  59 => 26,  35 => 5,  32 => 4,  29 => 3,);
    }
}

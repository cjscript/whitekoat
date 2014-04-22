<?php

/* AxonMedicineWhiteKoatBundle:Default:symptom.lib.html.twig */
class __TwigTemplate_a39d3ac11710e2414e9bf15cd1deb4e806cde37bf3c739059d84ba0182f6be6a extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("symlc_route_save");
        echo "\" data-validate=\"parsley\">

    <div style=\"padding-bottom:15px\">
        <input style=\"width:200px\" type=\"text\" id=\"itemname\" name=\"itemname\" placeholder=\"Item Name\" data-trigger=\"change\" data-required=\"true\">
    </div>
    <div style=\"padding-bottom:15px\">
        <input style=\"width:400px\" type=\"text\" id=\"itemdescription\" name=\"itemdescription\" placeholder=\"Item Description\" data-trigger=\"change\" data-required=\"true\">
    </div>

    <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Add Item\">

</form>


";
    }

    // line 21
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 22
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
            <th>Symptom Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["symptoms"]) ? $context["symptoms"] : $this->getContext($context, "symptoms")));
        foreach ($context['_seq'] as $context["_key"] => $context["symptom"]) {
            // line 47
            echo "        <tr >
            <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "name"), "html", null, true);
            echo "</td>
            <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "description"), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("symlc_route_remove", array("id" => $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['symptom'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:symptom.lib.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 53,  98 => 50,  94 => 49,  90 => 48,  87 => 47,  83 => 46,  57 => 22,  54 => 21,  35 => 5,  32 => 4,  29 => 3,);
    }
}

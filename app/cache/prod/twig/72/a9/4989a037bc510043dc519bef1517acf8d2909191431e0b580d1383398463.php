<?php

/* AxonMedicineWhiteKoatBundle:Default:student.search.main.html.twig */
class __TwigTemplate_72a94989a037bc510043dc519bef1517acf8d2909191431e0b580d1383398463 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:student.home.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.home.html.twig";
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
        echo $this->env->getExtension('routing')->getPath("sc_search_route_get");
        echo "\" data-validate=\"parsley\">
    <input type=\"hidden\" name=\"genericdrugnameid\" id=\"genericdrugnameid\">
    <div style=\"padding-top:30px\">
        What is/are the 
        <select class=\"selectpicker22\">
            <optgroup label=\"Library Type\">
            ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["libtypes"]) ? $context["libtypes"] : $this->getContext($context, "libtypes")));
        foreach ($context['_seq'] as $context["_key"] => $context["libtype"]) {
            // line 12
            echo "                <option>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libtype"]) ? $context["libtype"] : $this->getContext($context, "libtype")), "name"), "html", null, true);
            echo "</option>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['libtype'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "            </optgroup>
        </select>
        of <input style=\"width:383px\" type=\"text\" id=\"genericdrugname\" name=\"genericdrugname\" placeholder=\"Drug Name\" data-trigger=\"change\" data-required=\"true\">
        <td valign=\"top\"><a href=\"#\" id=\"genericdrugbutton\" class=\"btn btn-primary btn-lg\">Search Drug List</a></td>
    </div>
</form>


";
    }

    // line 24
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 25
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.search.main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 25,  69 => 24,  57 => 14,  48 => 12,  44 => 11,  35 => 5,  32 => 4,  29 => 3,);
    }
}

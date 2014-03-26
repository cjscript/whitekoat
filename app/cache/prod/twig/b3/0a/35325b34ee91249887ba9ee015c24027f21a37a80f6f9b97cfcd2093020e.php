<?php

/* AxonMedicineWhiteKoatBundle:Default:student.disease.search.html.twig */
class __TwigTemplate_b30a35325b34ee91249887ba9ee015c24027f21a37a80f6f9b97cfcd2093020e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:student.drug.disease.without.menu.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.drug.disease.without.menu.html.twig";
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
    <fieldset id=\"diseaserelationships\">
        <legend>Search Results</legend>

";
        // line 9
        if (array_key_exists("diseaseSearchOutput", $context)) {
            // line 10
            echo "        <div>
            <table class=\"table table-striped table-bordered\">
                <thead bgcolor=\"#cccccc\">
                    <tr>
                        <th></th>
                    </tr>
                </thead>     
                <tbody>
            ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["diseaseSearchOutput"]) ? $context["diseaseSearchOutput"] : $this->getContext($context, "diseaseSearchOutput")));
            foreach ($context['_seq'] as $context["_key"] => $context["something"]) {
                // line 19
                echo "                    <tr>
                        <td>";
                // line 20
                echo twig_escape_filter($this->env, (isset($context["something"]) ? $context["something"] : $this->getContext($context, "something")), "html", null, true);
                echo "</td>
                    </tr>
             ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['something'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "                </tbody>
            </table>
        </div>
";
        }
        // line 27
        echo "
        <div style=\"padding-top:30px\">
            <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Close Window\" onclick=\"window.close();
                    return true;\">
        </div>
</div>
";
    }

    // line 35
    public function block_tablecontent($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:student.disease.search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 35,  73 => 27,  67 => 23,  58 => 20,  55 => 19,  51 => 18,  41 => 10,  39 => 9,  32 => 4,  29 => 3,);
    }
}

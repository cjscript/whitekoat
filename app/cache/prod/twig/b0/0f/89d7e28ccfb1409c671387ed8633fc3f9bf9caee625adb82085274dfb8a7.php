<?php

/* AxonMedicineWhiteKoatBundle:Default:alias.lib.html.twig */
class __TwigTemplate_b00f89d7e28ccfb1409c671387ed8633fc3f9bf9caee625adb82085274dfb8a7 extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("alic_route_save");
        echo "\" data-validate=\"parsley\">

    <fieldset id=\"actionlib\">
        <legend>Alias Library Item</legend>

        <div style=\"padding-bottom:15px\">
            <input style=\"width:200px\" type=\"text\" id=\"itemname\" name=\"original\" placeholder=\"Original\" data-trigger=\"change\" data-required=\"true\">
        </div>
        <div style=\"padding-bottom:15px\">
            <input style=\"width:200px\" type=\"text\" id=\"itemname\" name=\"alias\" placeholder=\"Alias\" data-trigger=\"change\" data-required=\"true\">
        </div>

        <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Add Item\">
    </fieldset>
</form>


";
    }

    // line 24
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 25
        echo "
<table class=\"table table-striped \">
    <thead>
        <tr>
            <th>Original Name</th>
            <th>Alias Name</th>
            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 36
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["aliases"]) ? $context["aliases"] : $this->getContext($context, "aliases")));
        foreach ($context['_seq'] as $context["_key"] => $context["alias"]) {
            // line 37
            echo "        <tr >
            <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alias"]) ? $context["alias"] : $this->getContext($context, "alias")), "original"), "html", null, true);
            echo "</td>
            <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alias"]) ? $context["alias"] : $this->getContext($context, "alias")), "alias"), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("alic_route_remove", array("id" => $this->getAttribute((isset($context["alias"]) ? $context["alias"] : $this->getContext($context, "alias")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alias'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:alias.lib.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 43,  88 => 40,  84 => 39,  80 => 38,  77 => 37,  73 => 36,  60 => 25,  57 => 24,  35 => 5,  32 => 4,  29 => 3,);
    }
}

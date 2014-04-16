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

    <div style=\"padding-bottom:15px\">
        <input style=\"width:200px\" type=\"text\" id=\"original\" name=\"original\" placeholder=\"Original\" data-trigger=\"change\" data-required=\"true\">
    </div>
    <div style=\"padding-bottom:15px\">
        <input style=\"width:200px\" type=\"text\" id=\"alias\" name=\"alias\" placeholder=\"Alias\" data-trigger=\"change\" data-required=\"true\">
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
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["aliases"]) ? $context["aliases"] : $this->getContext($context, "aliases")));
        foreach ($context['_seq'] as $context["_key"] => $context["alias"]) {
            // line 34
            echo "        <tr >
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alias"]) ? $context["alias"] : $this->getContext($context, "alias")), "original"), "html", null, true);
            echo "</td>
            <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["alias"]) ? $context["alias"] : $this->getContext($context, "alias")), "alias"), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("alic_route_remove", array("id" => $this->getAttribute((isset($context["alias"]) ? $context["alias"] : $this->getContext($context, "alias")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alias'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
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
        return array (  94 => 40,  85 => 37,  81 => 36,  77 => 35,  74 => 34,  70 => 33,  57 => 22,  54 => 21,  35 => 5,  32 => 4,  29 => 3,);
    }
}

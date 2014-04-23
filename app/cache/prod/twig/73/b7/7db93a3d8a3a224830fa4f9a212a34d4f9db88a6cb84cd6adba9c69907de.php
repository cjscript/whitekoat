<?php

/* AxonMedicineWhiteKoatBundle:Default:molecule.lib.html.twig */
class __TwigTemplate_73b77db93a3d8a3a224830fa4f9a212a34d4f9db88a6cb84cd6adba9c69907de extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("mlc_route_save");
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
<table class=\"table table-striped \">
    <thead>
        <tr>
            <th>Molecule Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["molecules"]) ? $context["molecules"] : $this->getContext($context, "molecules")));
        foreach ($context['_seq'] as $context["_key"] => $context["molecule"]) {
            // line 34
            echo "        <tr >
            <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["molecule"]) ? $context["molecule"] : $this->getContext($context, "molecule")), "name"), "html", null, true);
            echo "</td>
            <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["molecule"]) ? $context["molecule"] : $this->getContext($context, "molecule")), "description"), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("mlc_route_remove", array("id" => $this->getAttribute((isset($context["molecule"]) ? $context["molecule"] : $this->getContext($context, "molecule")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['molecule'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:molecule.lib.html.twig";
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

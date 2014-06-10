<?php

/* AxonMedicineWhiteKoatBundle:Default:action.lib.html.twig */
class __TwigTemplate_39e0f5028fe86dc6ff6094500530f799a49019c65f97f29b1f349911ce10fffd extends Twig_Template
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
        echo $this->env->getExtension('routing')->getPath("actc_route_save");
        echo "\" data-validate=\"parsley\">
    <fieldset id=\"actionlib\">
        <legend>Action Library Item</legend>

        <div style=\"padding-bottom:15px\">
            <input style=\"width:200px\" type=\"text\" id=\"itemname\" name=\"itemname\" placeholder=\"Item Name\" data-trigger=\"change\" data-required=\"true\">
        </div>
        <div style=\"padding-bottom:15px\">
            <input style=\"width:400px\" type=\"text\" id=\"itemdescription\" name=\"itemdescription\" placeholder=\"Item Description\" data-trigger=\"change\" data-required=\"true\">
        </div>

        <input class=\"btn btn-primary btn-lg\" type=\"submit\" value=\"Add Item\">
    </fieldset>
</form>


";
    }

    // line 23
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 24
        echo "
<table class=\"table table-striped \">
    <thead>
        <tr>
            <th>Action Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>     
    <tbody>

            ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actions"]) ? $context["actions"] : $this->getContext($context, "actions")));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 36
            echo "        <tr >
            <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "name"), "html", null, true);
            echo "</td>
            <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "description"), "html", null, true);
            echo "</td>
            <td><a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("actc_route_remove", array("id" => $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "id"))), "html", null, true);
            echo "\">remove</a>
        </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:action.lib.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 42,  87 => 39,  83 => 38,  79 => 37,  76 => 36,  72 => 35,  59 => 24,  56 => 23,  35 => 5,  32 => 4,  29 => 3,);
    }
}

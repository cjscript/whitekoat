<?php

/* AxonMedicineWhiteKoatBundle:Default:login.html.twig */
class __TwigTemplate_edc22ba65371a0c7de2969ccae24bdbfa325a9da202a76856878fe2066aa8708 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "<style type=\"text/css\">
    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    .form-signin input[type=\"text\"],
    .form-signin input[type=\"password\"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
    }

</style>
";
    }

    // line 32
    public function block_container($context, array $blocks = array())
    {
        // line 33
        echo "<div class=\"container\">

    <form class=\"form-signin\" method =\"POST\" action=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("login_route");
        echo "\" data-validate=\"parsley\">
        <h2 class=\"form-signin-heading\">Please sign in</h2>
        <div style=\"padding-bottom:10px\">
            <input type=\"text\" id=\"username\" class=\"input-block-level\" name=\"username\" placeholder=\"Email address\" data-trigger=\"change\" data-required=\"true\" data-type=\"email\">
        </div>
        <div style=\"padding-bottom:20px\">
            <input type=\"password\" class=\"input-block-level\" name=\"password\" placeholder=\"Password\" data-trigger=\"change\" data-required=\"true\">
        </div>

        <label class=\"checkbox\">
            <input type=\"checkbox\" name=\"remember\" value=\"remember-me\">Remember me
        </label>
        <button class=\"btn btn-large btn-primary\" type=\"submit\">Sign in</button>
        <a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("signup_route");
        echo "\" >Sign Up</a>
    </form>

</div> 
    ";
        // line 52
        if (array_key_exists("name", $context)) {
            // line 53
            echo "<div class=\"alert-info fade in\">
    <strong>";
            // line 54
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
            echo "</strong>
</div>
    ";
        }
        // line 57
        echo "    ";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 57,  98 => 54,  95 => 53,  93 => 52,  86 => 48,  70 => 35,  66 => 33,  63 => 32,  32 => 4,  29 => 3,);
    }
}

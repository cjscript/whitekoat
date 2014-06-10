<?php

/* AxonMedicineWhiteKoatBundle:Default:studenthome.html.twig */
class __TwigTemplate_0f01a404cacfa3bb04654e8568c50627dddd6a70a4924ffd856f9175618d449b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:home.student.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'cardstylesheets' => array($this, 'block_cardstylesheets'),
            'cardprejavascripts' => array($this, 'block_cardprejavascripts'),
            'tablecontent' => array($this, 'block_tablecontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AxonMedicineWhiteKoatBundle:Default:home.student.html.twig";
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
";
        // line 5
        $this->displayBlock('cardstylesheets', $context, $blocks);
        // line 7
        $this->displayBlock('cardprejavascripts', $context, $blocks);
        // line 51
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/home.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
<div class=\"home-content\">

    <div id=\"imageContainer\">
        <img src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/images/logo.png"), "html", null, true);
        echo "\" id=\"homeLogo\" width=\"300px\" height=\"120px\"></img>
    </div>
    <div id=\"searchContainer\">
        <form id=\"cardSearch\" action=\"\" autocomplete=\"off\">\t
            <input type=\"text\" id=\"cardSearchField\" placeholder=\"Drug or Disease or Symptom\"/><input type=\"submit\" value=\"search\"/>
        </form>
    </div>
</div>
</div>

<script type=\"text/javascript\">
    \$(\"#cardSearch\").submit(function(event) {
        var cardName = (\$(\"#cardSearchField\").val());
        window.location.href = \"results?term[]=\" + cardName;
        event.preventDefault();
        return false;
    });
</script>

";
    }

    // line 5
    public function block_cardstylesheets($context, array $blocks = array())
    {
    }

    // line 7
    public function block_cardprejavascripts($context, array $blocks = array())
    {
        // line 8
        echo "
<script type=\"text/javascript\">
    \$(document).ready(function() {
        \$(function() {
            \$(\"#cardSearchField\").autocomplete({
                /*source: function(request, response) {
                 \$.ajax({
                 url: \"home/autocomplete\",
                 dataType: \"json\",
                 data: {
                 term: request.term
                 },
                 success: function(data) {
                 //console.log(data);
                 response(data);
                 }
                 });
                 },*/
                source: \"home/autocomplete\",
                minLength: 1,
                focus: function(event, ui) {
                    \$(\"#cardSearchField\").val(ui.item.label);
                    return false;
                },
                select: function(event, ui) {
                    window.location.href = \"results?exmat=true&term[]=\" + ui.item.label;
                }


            })
            /*.data(\"ui-autocomplete\")._renderItem = function(ul, item) {
             return \$(\"<li>\")
             .append('<span class=\"cardName\">' + item.label + ': </span><span class=\"cardType\">' + item.cardType + '</span>')
             .appendTo(ul);
             };*/
        });
    });




</script>
";
    }

    // line 76
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 77
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:studenthome.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 77,  127 => 76,  81 => 8,  78 => 7,  73 => 5,  49 => 55,  41 => 51,  39 => 7,  37 => 5,  34 => 4,  31 => 3,);
    }
}

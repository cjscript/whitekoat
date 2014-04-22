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

 
\t\t<div id=\"imageContainer\">
\t\t\t<img src=\"../bundles/axonmedicinewhitekoat/images/logo.png\" id=\"homeLogo\" width=\"300px\" height=\"120px\"></img>
\t\t</div>
\t\t<div id=\"searchContainer\">
\t\t\t<form id=\"cardSearch\" action=\"\" autocomplete=\"off\">\t
\t\t\t\t<input type=\"text\" id=\"cardSearchField\" placeholder=\"Drug or Disease\"/><input type=\"submit\" value=\"search\"/>
\t\t\t</form>
\t\t</div>
\t</div>
</div>

<script type=\"text/javascript\">
\t\$(\"#cardSearch\").submit(function(event) {
\t\t\tvar cardName = (\$(\"#cardSearchField\").val());
\t\t\twindow.location.href = \"results?term[]=\" + cardName;
\t\t\tevent.preventDefault();
\t\t\treturn false;
\t});
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
\t\$(document).ready(function() {
\t\t\$(function() {
\t\t\t\$(\"#cardSearchField\").autocomplete({
\t\t\t\t/*source: function(request, response) {
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\turl: \"home/autocomplete\",
\t\t\t\t\t\tdataType: \"json\",
\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\tterm: request.term
\t\t\t\t\t\t},
\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t//console.log(data);
\t\t\t\t\t\t\tresponse(data);
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t},*/
\t\t\t\tsource: \"home/autocomplete\",
\t\t\t\tminLength: 1,
\t\t\t\tfocus: function(event, ui) {
\t\t\t\t\t\$(\"#cardSearchField\").val(ui.item.label);
\t\t\t\t\treturn false;
\t\t\t\t},
\t\t\t\tselect: function(event, ui) {
\t\t\t\t\t window.location.href = \"results?term[]=\" + ui.item.label;
\t\t\t\t}
\t\t\t\t\t

\t\t\t})
\t\t\t/*.data(\"ui-autocomplete\")._renderItem = function(ul, item) {
\t\t\t\treturn \$(\"<li>\")
\t\t\t\t\t.append('<span class=\"cardName\">' + item.label + ': </span><span class=\"cardType\">' + item.cardType + '</span>')
\t\t\t\t\t.appendTo(ul);
\t\t\t};*/
\t\t});
\t});


\t\t
\t
</script>
";
    }

    // line 77
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 78
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
        return array (  128 => 78,  125 => 77,  79 => 8,  76 => 7,  71 => 5,  41 => 51,  39 => 7,  37 => 5,  34 => 4,  31 => 3,);
    }
}

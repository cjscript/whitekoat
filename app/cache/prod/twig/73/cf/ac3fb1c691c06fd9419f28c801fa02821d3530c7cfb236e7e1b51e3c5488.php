<?php

/* AxonMedicineWhiteKoatBundle:Default:diseaseCard.html.twig */
class __TwigTemplate_73cfac3fb1c691c06fd9419f28c801fa02821d3530c7cfb236e7e1b51e3c5488 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"card diseaseCard\">
\t<div class=\"cardContent\">
\t\t<div class=\"topBar\">
\t\t\t<div class=\"topBarPadding\"></div>
\t\t\t<div class=\"cardTitle\">
\t\t\t\t<h1>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasename"), "name"), "html", null, true);
        echo "</h1>
\t\t\t</div>
\t\t\t<div class=\"topRightButtons\">
\t\t\t\t<div class=\"buttonTitle\">&nbsp;</div>
\t\t\t\t<a href=\"#\" class=\"closeButton\" data-tooltip=\"Close\"></a>
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"drugCardButtonArea btn-toolbar\">
\t\t\t<button type=\"button\" class=\"btn btn-primary overviewBtn\">Overview</button>
\t\t\t<button type=\"button\" class=\"btn btn-default infoBtn\">Info</button>
\t\t\t<button type=\"button\" class=\"btn btn-default detailsBtn\">Details</button>
\t\t\t<button type=\"button\" class=\"btn btn-default highYieldBtn\">High Yield</button>
\t\t</div>
\t\t
\t\t<div class=\"cardTabContainer\">
\t\t\t<div class=\"overviewTab cardTab\">
\t\t\t\t<div class=\"drugCardDescription\">
\t\t\t\t\t";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasename"), "description"), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-cause\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Cause/Etiology</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasecause"));
        foreach ($context['_seq'] as $context["_key"] => $context["cause"]) {
            // line 32
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 36
            if ($this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "hasImages")) {
                // line 37
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 40
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cause'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-symptom\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Symptoms</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasesymptom"));
        foreach ($context['_seq'] as $context["_key"] => $context["symptom"]) {
            // line 50
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 54
            if ($this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "hasImages")) {
                // line 55
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["symptom"]) ? $context["symptom"] : $this->getContext($context, "symptom")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 58
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['symptom'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-treatments\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Treatments</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 67
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasetreatment"));
        foreach ($context['_seq'] as $context["_key"] => $context["treatment"]) {
            // line 68
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 72
            if ($this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "hasImages")) {
                // line 73
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 76
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['treatment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"infoTab cardTab\" style=\"display:none\">
\t\t\t\t<div class=\"cardInfo diease-type\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Disease Class/Type</span><span class=\"maximizeButton\"></span></h3> 
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 88
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasetype"));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 89
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 93
            if ($this->getAttribute((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "hasImages")) {
                // line 94
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 97
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t<div class=\"cardInfo disease-demographics\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Demographics</span><!--<span class=\"maximizeButton\"></span>--></h3> 
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-organs\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Organ Sys &amp; Structs</span><!--<span class=\"maximizeButton\"></span>--></h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"cardInfo disease-billing\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Billing Info</span><!--<span class=\"maximizeButton\"></span>--></h3>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"detailsTab cardTab\" style=\"display:none\">
\t\t\t\t<div class=\"cardInfo disease-cause\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Cause/Etiology</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 118
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "diseasecause"));
        foreach ($context['_seq'] as $context["_key"] => $context["cause"]) {
            // line 119
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 123
            if ($this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "hasImages")) {
                // line 124
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cause"]) ? $context["cause"] : $this->getContext($context, "cause")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 127
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cause'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-mechanism\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Mechanism</span><!--<span class=\"maximizeButton\"></span>--></h3>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"highYieldTab cardTab\" style=\"display:none\">
\t\t\t\t<div class=\"cardInfo disease-labs\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Labs &amp; Tests</span><!--<span class=\"maximizeButton\"></span>--></h3>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-resources\" >
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Study Resources</span><!--<span class=\"maximizeButton\"></span>--></h3>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo disease-media\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Media</span><!--<span class=\"maximizeButton\"></span>--></h3>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:diseaseCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 130,  276 => 127,  269 => 124,  267 => 123,  262 => 121,  252 => 119,  248 => 118,  228 => 100,  220 => 97,  213 => 94,  211 => 93,  206 => 91,  196 => 89,  192 => 88,  181 => 79,  173 => 76,  166 => 73,  164 => 72,  159 => 70,  149 => 68,  145 => 67,  137 => 61,  129 => 58,  122 => 55,  120 => 54,  115 => 52,  105 => 50,  101 => 49,  93 => 43,  85 => 40,  78 => 37,  76 => 36,  71 => 34,  61 => 32,  57 => 31,  47 => 24,  26 => 6,  19 => 1,);
    }
}

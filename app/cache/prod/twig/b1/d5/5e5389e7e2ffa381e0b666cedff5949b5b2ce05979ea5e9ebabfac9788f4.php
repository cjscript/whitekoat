<?php

/* AxonMedicineWhiteKoatBundle:Default:drugCard.html.twig */
class __TwigTemplate_b1d55e5389e7e2ffa381e0b666cedff5949b5b2ce05979ea5e9ebabfac9788f4 extends Twig_Template
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
        echo "<div class=\"card drugCard\">
\t<div class=\"cardContent\">
\t\t<div class=\"topBar\">
\t\t\t<div class=\"topBarPadding\"></div>
\t\t\t<div class=\"cardTitle\">
\t\t\t\t<h1>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugname"), "name"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugname"), "description"), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo drug-class\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Drug Class</span><span class=\"maximizeButton\"></span></h3> 
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugclass"));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 31
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 35
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "hasImages")) {
                // line 36
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 39
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo drug-target\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Drug Target</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugtarget"));
        foreach ($context['_seq'] as $context["_key"] => $context["target"]) {
            // line 49
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 53
            if ($this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "hasImages")) {
                // line 54
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 57
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['target'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo drug-indications\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Indications</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugtreatment"));
        foreach ($context['_seq'] as $context["_key"] => $context["treatment"]) {
            // line 67
            echo "\t\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
            // line 71
            if ($this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "hasImages")) {
                // line 72
                echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["treatment"]) ? $context["treatment"] : $this->getContext($context, "treatment")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
            }
            // line 75
            echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li></span>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['treatment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"infoTab cardTab\" style=\"display:none\">
\t\t\t\t<div class=\"cardInfo drug-name\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Drug Name</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugbrand"));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 87
            echo "\t\t\t\t\t\t<li>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["brand"]) ? $context["brand"] : $this->getContext($context, "brand")), "name"), "html", null, true);
            echo "</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo drug-class\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Drug Class</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 95
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugclass"));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 96
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 100
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "hasImages")) {
                // line 101
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 104
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 107
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Dosage &amp; Usage</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"detailsTab cardTab\" style=\"display:none\">
\t\t\t\t<div class=\"cardInfo drug-target\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Drug Target</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 119
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugtarget"));
        foreach ($context['_seq'] as $context["_key"] => $context["target"]) {
            // line 120
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 124
            if ($this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "hasImages")) {
                // line 125
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\"  data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["target"]) ? $context["target"] : $this->getContext($context, "target")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 128
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['target'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 131
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo\">
\t\t\t\t\t<h3 class=\"sectionTitle drug-mechanism\"><span class=\"title\">Mechanism</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<p>";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugmechanism"), "html", null, true);
        echo "</p>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"highYieldTab cardTab\" style=\"display:none\">
\t\t\t\t<div class=\"cardInfo drug-side-effects\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Side Effects</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 146
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugsideeffect"));
        foreach ($context['_seq'] as $context["_key"] => $context["sideEffect"]) {
            // line 147
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sideEffect"]) ? $context["sideEffect"] : $this->getContext($context, "sideEffect")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sideEffect"]) ? $context["sideEffect"] : $this->getContext($context, "sideEffect")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sideEffect"]) ? $context["sideEffect"] : $this->getContext($context, "sideEffect")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 149
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sideEffect"]) ? $context["sideEffect"] : $this->getContext($context, "sideEffect")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 151
            if ($this->getAttribute((isset($context["sideEffect"]) ? $context["sideEffect"] : $this->getContext($context, "sideEffect")), "hasImages")) {
                // line 152
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sideEffect"]) ? $context["sideEffect"] : $this->getContext($context, "sideEffect")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 155
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sideEffect'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 158
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo drug-contraindications\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Contraindications</span><span class=\"maximizeButton\"></span></h3> 
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 164
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["card"]) ? $context["card"] : $this->getContext($context, "card")), "drugcontraind"));
        foreach ($context['_seq'] as $context["_key"] => $context["contraind"]) {
            // line 165
            echo "\t\t\t\t\t\t<span class=\"libValLinkContainer\"><li><a href=\"#\" onclick=\"addResultsCard('";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contraind"]) ? $context["contraind"] : $this->getContext($context, "contraind")), "id"), "html", null, true);
            echo "', this);return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contraind"]) ? $context["contraind"] : $this->getContext($context, "contraind")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contraind"]) ? $context["contraind"] : $this->getContext($context, "contraind")), "name"), "html", null, true);
            echo "</a> <a href=\"#\" class=\"hamburger\"></a>
\t\t\t\t\t\t\t<ul class=\"hamburgerSubNav\">
\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"descriptionLink\" data-libraryID=\"";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contraind"]) ? $context["contraind"] : $this->getContext($context, "contraind")), "id"), "html", null, true);
            echo "\">Description</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 169
            if ($this->getAttribute((isset($context["contraind"]) ? $context["contraind"] : $this->getContext($context, "contraind")), "hasImages")) {
                // line 170
                echo "\t\t\t\t\t\t\t\t\t<li><a href=\"#\" class=\"imageLink\" data-libraryID=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contraind"]) ? $context["contraind"] : $this->getContext($context, "contraind")), "id"), "html", null, true);
                echo "\">Images</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 173
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li></span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contraind'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:drugCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  397 => 176,  389 => 173,  382 => 170,  380 => 169,  375 => 167,  365 => 165,  361 => 164,  353 => 158,  345 => 155,  338 => 152,  336 => 151,  331 => 149,  321 => 147,  317 => 146,  304 => 136,  297 => 131,  289 => 128,  282 => 125,  280 => 124,  275 => 122,  265 => 120,  261 => 119,  247 => 107,  239 => 104,  232 => 101,  230 => 100,  225 => 98,  215 => 96,  211 => 95,  203 => 89,  194 => 87,  190 => 86,  180 => 78,  172 => 75,  165 => 72,  163 => 71,  158 => 69,  148 => 67,  144 => 66,  136 => 60,  128 => 57,  121 => 54,  119 => 53,  114 => 51,  104 => 49,  100 => 48,  92 => 42,  84 => 39,  77 => 36,  75 => 35,  70 => 33,  60 => 31,  56 => 30,  47 => 24,  26 => 6,  19 => 1,);
    }
}

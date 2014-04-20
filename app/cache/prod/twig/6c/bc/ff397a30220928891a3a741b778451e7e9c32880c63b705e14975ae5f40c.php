<?php

/* AxonMedicineWhiteKoatBundle:Default:resultsCard.html.twig */
class __TwigTemplate_6cbcff397a30220928891a3a741b778451e7e9c32880c63b705e14975ae5f40c extends Twig_Template
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
        echo "<div class=\"card resultsCard\">
\t<div class=\"cardContent\">
\t\t<div class=\"topBar\">
\t\t\t<div class=\"topBarPadding\"></div>
\t\t\t<div class=\"cardTitle\">
\t\t\t\t<h1><small>Results for</small><br> ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libValue"]) ? $context["libValue"] : $this->getContext($context, "libValue")), "name"), "html", null, true);
        echo "</h1>
\t\t\t</div>
\t\t\t<div class=\"spacer\"></div>
\t\t\t<div class=\"topRightButtons\">
\t\t\t\t<div class=\"buttonTitle\">&nbsp;</div>
\t\t\t\t<a href=\"#\" class=\"closeButton\" data-tooltip=\"Close\"></a>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"cardTabContainer\">
\t\t\t<div class=\"cardTab\">
\t\t\t\t<div class=\"cardInfo results-diseases\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Diseases</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diseases"]) ? $context["diseases"] : $this->getContext($context, "diseases")));
        foreach ($context['_seq'] as $context["_key"] => $context["disease"]) {
            // line 20
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"#\" onclick=\"addDiseaseCard('";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["disease"]) ? $context["disease"] : $this->getContext($context, "disease")), "id"), "html", null, true);
            echo "');return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["disease"]) ? $context["disease"] : $this->getContext($context, "disease")), "id"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["disease"]) ? $context["disease"] : $this->getContext($context, "disease")), "diseasename"), "description"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["disease"]) ? $context["disease"] : $this->getContext($context, "disease")), "diseasename"), "name"), "html", null, true);
            echo "</a><br/>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['disease'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"cardInfo results-drugs\">
\t\t\t\t\t<h3 class=\"sectionTitle\"><span class=\"title\">Drugs</span><span class=\"maximizeButton\"></span></h3>
\t\t\t\t\t<ul>
\t\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugs"]) ? $context["drugs"] : $this->getContext($context, "drugs")));
        foreach ($context['_seq'] as $context["_key"] => $context["drug"]) {
            // line 31
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"#\" onclick=\"addDrugCard('";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "id"), "html", null, true);
            echo "');return false;\" data-libraryID=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "id"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "drugname"), "description"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "drugname"), "name"), "html", null, true);
            echo "</a><br/>
\t\t\t\t\t\t\t<!--";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["drug"]) ? $context["drug"] : $this->getContext($context, "drug")), "drugname"), "description"), "html", null, true);
            echo "-->
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drug'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:resultsCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 36,  89 => 33,  79 => 32,  76 => 31,  72 => 30,  64 => 24,  49 => 21,  46 => 20,  42 => 19,  26 => 6,  19 => 1,);
    }
}

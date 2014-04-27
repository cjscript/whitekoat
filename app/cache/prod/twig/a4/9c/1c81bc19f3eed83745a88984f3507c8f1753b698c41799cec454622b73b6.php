<?php

/* AxonMedicineWhiteKoatBundle:Default:imageCard.html.twig */
class __TwigTemplate_a49c1c81bc19f3eed83745a88984f3507c8f1753b698c41799cec454622b73b6 extends Twig_Template
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
        echo "<div class=\"card imageCard\">
    <div class=\"cardContent\">
        <div class=\"topBar\">
            <div class=\"topBarPadding\"></div>
            <div class=\"cardTitle\">
                <h1><small>Images of </small><br>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libValue"]) ? $context["libValue"] : $this->getContext($context, "libValue")), "name"), "html", null, true);
        echo "</h1>
            </div>
            <div class=\"topRightButtons\">
                <div class=\"buttonTitle\">&nbsp;</div>
                <a href=\"#\" class=\"closeButton\" data-tooltip=\"Close\"></a>
            </div>
        </div>
        <div class=\"spacer\"></div>
        <div class=\"cardTabContainer\">
            <div class=\"imageContent\">
            \t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["images"]) ? $context["images"] : $this->getContext($context, "images")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 17
            echo "                <a href=\"/images_3921343193822/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : $this->getContext($context, "image")), "imageref"), "id"), "html", null, true);
            echo ".";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : $this->getContext($context, "image")), "imageref"), "originalfileext"), "html", null, true);
            echo "\" data-lightbox=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libValue"]) ? $context["libValue"] : $this->getContext($context, "libValue")), "name"), "html", null, true);
            echo "\">
                    <img src=\"/images_3921343193822/";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : $this->getContext($context, "image")), "imageref"), "id"), "html", null, true);
            echo "_thmb.";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["image"]) ? $context["image"] : $this->getContext($context, "image")), "imageref"), "originalfileext"), "html", null, true);
            echo "\"></a>
                    ";
            // line 19
            if (((0 == $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2) && (!$this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last")))) {
                // line 20
                echo "                <br>
                    ";
            }
            // line 22
            echo "\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:imageCard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 23,  77 => 22,  73 => 20,  71 => 19,  65 => 18,  56 => 17,  39 => 16,  26 => 6,  19 => 1,);
    }
}

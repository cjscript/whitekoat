<?php

/* AxonMedicineWhiteKoatBundle:Default:image.lib.html.twig */
class __TwigTemplate_3ea0f876e7726d9b9e272e95657ac9548e950d6e223e87436ede53c22eafb0bb extends Twig_Template
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
<div id=\"someclass\">
    <div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">
        <div class=\"input-append\">
            <form class=\"form\" method =\"POST\"  enctype=\"multipart/form-data\" action=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("image_route_save");
        echo "\">
                <fieldset id=\"drugrelationships\">
                    <legend>Image Library Tag</legend>

                    <div style=\"padding-bottom:15px\">
                        <input type=\"hidden\" name=\"libraryId\" id=\"libraryId\">
                        <table>
                            <tr>
                                <td><select style=\"width:400px\" size=\"3\" id=\"libraryIds\" name=\"libraryIds[]\" multiple=\"multiple\">
                            ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["libs"]) ? $context["libs"] : $this->getContext($context, "libs")));
        foreach ($context['_seq'] as $context["_key"] => $context["lib"]) {
            // line 18
            echo "                                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lib"]) ? $context["lib"] : $this->getContext($context, "lib")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["lib"]) ? $context["lib"] : $this->getContext($context, "lib")), "name"), "html", null, true);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lib'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                                    </select></td>
                            </tr>
                        </table>
                    </div>
                </fieldset>

                <fieldset id=\"importdrugdata\">
                    <legend>Image File</legend>
                    <div class=\"uneditable-input span6\">
                        <i class=\"icon-file fileupload-exists\"></i> 
                        <span class=\"fileupload-preview\"></span>
                    </div>
                    <span class=\"btn btn-file\">
                        <span class=\"fileupload-new\">Select file</span>
                        <span class=\"fileupload-exists\">Change</span>
                        <input type=\"file\" name=\"img\"/>
                    </span>
                    <button class=\"btn btn-primary fileupload-exists\" type=\"submit\">Tag Libraries with Image</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
";
    }

    // line 45
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 46
        echo "
<div style=\"height:300px;overflow:auto;\">
    <table class=\"table table-striped \">
        <thead>
            <tr>
                <th width=\"50px\"></th>
                <th>Image File Name</th>
                <th>Library Tag</th>
                <th>Action</th>
            </tr>
        </thead>     
        <tbody>

            ";
        // line 59
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["imageLibs"]) ? $context["imageLibs"] : $this->getContext($context, "imageLibs")));
        foreach ($context['_seq'] as $context["_key"] => $context["imageLib"]) {
            // line 60
            echo "            <tr>
                <td><a class=\"fancybox\" rel=\"group\" href=\"./images_3921343193822/";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["imageLib"]) ? $context["imageLib"] : $this->getContext($context, "imageLib")), "id"), "html", null, true);
            echo "\">
                        <img src=\"./images_3921343193822/";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["imageLib"]) ? $context["imageLib"] : $this->getContext($context, "imageLib")), "id"), "html", null, true);
            echo "_thmb\" alt=\"\"></a></td>
                <td>";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["imageLib"]) ? $context["imageLib"] : $this->getContext($context, "imageLib")), "originalfilename"), "html", null, true);
            echo "</td>
                <td>";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["imageLib"]) ? $context["imageLib"] : $this->getContext($context, "imageLib")), "name"), "html", null, true);
            echo "</td>
                <td>remove</td>
            </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['imageLib'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "        </tbody>
    </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:image.lib.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 68,  129 => 64,  125 => 63,  121 => 62,  117 => 61,  114 => 60,  110 => 59,  95 => 46,  92 => 45,  65 => 20,  54 => 18,  50 => 17,  38 => 8,  32 => 4,  29 => 3,);
    }
}

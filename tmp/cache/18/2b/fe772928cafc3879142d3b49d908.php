<?php

/* layout.phtml */
class __TwigTemplate_182bfe772928cafc3879142d3b49d908 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'mainbody' => array($this, 'block_mainbody'),
            'customScript' => array($this, 'block_customScript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"UTF-8\">
\t<title>";
        // line 5
        if (isset($context["pageInfo"])) { $_pageInfo_ = $context["pageInfo"]; } else { $_pageInfo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_pageInfo_, "title"), "html", null, true);
        echo "</title>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/main.css\" />
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/pagination.css\" />
</head>

<body>
<!--  All content goes here -->
\t<div class=\"maincontainer\">

\t<!-- Header stuff -->
\t\t<div class=\"headercontainer\">
\t\t\t<div class=\"logocontainer\">
\t\t\t\t<div class=\"logo\">Logo!</div>
\t\t\t\t<div class=\"logininfo\">
\t\t\t\t\t<div class=\"infotext\">
\t\t\t\t\t\t<p class=\"loginName\">";
        // line 20
        if (isset($context["userInfo"])) { $_userInfo_ = $context["userInfo"]; } else { $_userInfo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userInfo_, "name"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t<p class=\"loginNumRecipes\">";
        // line 21
        if (isset($context["userInfo"])) { $_userInfo_ = $context["userInfo"]; } else { $_userInfo_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_userInfo_, "recipes"), "html", null, true);
        echo " recipes posted</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"accountIcon\"><img class=\"icon\" src=\"/img/icon.jpg\" /></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"searchcontainer\">
\t\t\t\t<div class=\"searchInput\">
\t\t\t\t\t<input type=\"text\" value=\"Search Recipes\" class=\"search\" onFocus=\"if(this.value=='Search Recipes'){this.value=''; this.style.color = '#000000';}\" onBlur=\"if(this.value == ''){this.value = 'Search Recipes'; this.style.color='#999';}\"/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"maincontent\">
\t\t\t<div class=\"navcontainer\">
\t\t\t\t<ul>
\t\t\t\t";
        // line 36
        if (isset($context["navLinks"])) { $_navLinks_ = $context["navLinks"]; } else { $_navLinks_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_navLinks_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 37
            echo "\t\t\t\t\t<li><a href=\"";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "link"), "html", null, true);
            echo "\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "text"), "html", null, true);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 39
        echo "\t\t\t\t</ul>

\t\t\t</div>

\t\t\t<div class=\"mainbody\">
\t\t\t";
        // line 44
        $this->displayBlock('mainbody', $context, $blocks);
        // line 45
        echo "\t\t\t</div>
\t\t</div>
\t</div>

        ";
        // line 49
        if (isset($context["scripts"])) { $_scripts_ = $context["scripts"]; } else { $_scripts_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_scripts_);
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 50
            echo "\t\t<script src=\"";
            if (isset($context["script"])) { $_script_ = $context["script"]; } else { $_script_ = null; }
            echo twig_escape_filter($this->env, $_script_, "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 52
        echo " \t";
        $this->displayBlock('customScript', $context, $blocks);
        // line 53
        echo "
</body>
</html>
";
    }

    // line 44
    public function block_mainbody($context, array $blocks = array())
    {
        echo " I NEED CONTENT! ";
    }

    // line 52
    public function block_customScript($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "layout.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 52,  126 => 44,  119 => 53,  116 => 52,  106 => 50,  101 => 49,  95 => 45,  93 => 44,  86 => 39,  73 => 37,  68 => 36,  49 => 21,  44 => 20,  25 => 5,  19 => 1,  29 => 3,  26 => 2,);
    }
}

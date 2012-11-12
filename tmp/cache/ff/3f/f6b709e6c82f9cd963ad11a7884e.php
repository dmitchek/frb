<?php

/* feed.phtml */
class __TwigTemplate_ff3ff6b709e6c82f9cd963ad11a7884e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.phtml");

        $this->blocks = array(
            'mainbody' => array($this, 'block_mainbody'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.phtml";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_mainbody($context, array $blocks = array())
    {
        // line 3
        echo "
\t\t<div class=\"maintitle\"><h1>Recipe Feed</h1></div>
\t\t<div class=\"separator\">&nbsp;</div>
\t\t\t<ul class=\"recipeList\">
\t\t\t\t<li class=\"recipe\">
\t\t\t\t    <div class=\"icon\"><img src=\"/img/food_icon.jpg\"/></div>
\t\t\t\t    <div class=\"info\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li><h1>Dave's Peach Pie</h1></li>
\t\t\t\t\t\t<li><h3>Serves 6</h3></li>
\t\t\t\t\t\t<li><h3>Prep/Cook Time: 1 hour 45 min</h3></li>
\t\t\t\t\t\t<li><h3>Submitted by: Dave</h3></li>
\t\t\t\t\t\t<li><h3>6/7/2012 12:00 am</h3></li>
\t\t\t\t\t</ul>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"userInfo\">
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li><h2>David Mitchell</h2></li>
\t\t\t\t\t\t<li><h3>24 Recipes Posted</h3></li>
\t\t\t\t\t</ul>
\t\t\t\t        <img class=\"userIconImg\" src=\"/img/icon.jpg\"/>
\t\t\t\t    </div>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t
\t\t\t<div id=\"Pagination\"></div>
<br style=\"clear:both;\" />
<div id=\"Searchresult\">
This content will be replaced when pagination inits.
</div>
        
         <!-- Container element for all the Elements that are to be paginated -->
        <div id=\"hiddenresult\" style=\"display:none;\">
        
        </div>



\t\t</div>

\t\t<script>
\t\t\t\$(document).ready(function () {
\t
\t\t\t\t//getRecipes(0, 5);
\t\t\t\t\$.getJSON('/recipe.php', {offset: 0, length: 5}, initPagination);
\t\t\t});

\t\t</script>

";
    }

    public function getTemplateName()
    {
        return "feed.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,);
    }
}

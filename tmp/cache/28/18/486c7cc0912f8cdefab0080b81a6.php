<?php

/* submit.phtml */
class __TwigTemplate_2818486c7cc0912f8cdefab0080b81a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.phtml");

        $this->blocks = array(
            'mainbody' => array($this, 'block_mainbody'),
            'customScript' => array($this, 'block_customScript'),
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

    // line 3
    public function block_mainbody($context, array $blocks = array())
    {
        echo " 
\t\t<div class=\"maintitle\"><h1>Submit a Recipe</h1></div>
\t\t<div class=\"separator\">&nbsp;</div>
\t\t\t<ul class=\"submitInputList\">
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<label for=\"submitted_by\">Submitted By:</label>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<select id=\"submitted_by\" data-type=\"id\" name=\"submitted_by\">
\t\t\t\t\t\t\t<option value=\"-1\">Please Select</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<label for=\"recipe_title\">Title: </label>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">\t
\t\t\t\t\t\t<input id=\"recipe_title\" data-type=\"string\" name=\"recipe_title\"/>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<label for=\"recipe_category\">Category:</label>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<select id=\"recipe_category\" data-type=\"number\" name=\"recipe_category\">
\t\t\t\t\t\t\t<option value=\"-1\">Please Select</option>
\t\t\t\t\t\t\t";
        // line 32
        if (isset($context["categories"])) { $_categories_ = $context["categories"]; } else { $_categories_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_categories_);
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 33
            echo "\t\t\t\t\t\t\t<option value=\"";
            if (isset($context["category"])) { $_category_ = $context["category"]; } else { $_category_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_category_, "value"), "html", null, true);
            echo "\">";
            if (isset($context["category"])) { $_category_ = $context["category"]; } else { $_category_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_category_, "text"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 34
        echo "\t
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<label for=\"recipe_serves\">How many does this recipe serve?</label>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<input id=\"recipe_serves\" data-type=\"number\" name=\"recipe_serves\" value=\"0\" class=\"input-small\"/>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<label for=\"prep_time_hours\">What is the prep time? </label>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<input id=\"prep_time_hours\" name=\"prep_time_hours\" class=\"input-small\" value=\"0\" /> hours 
\t\t\t\t\t\t<input id=\"prep_time_min\" name=\"prep_time_min\" class=\"input-small\" value=\"0\" /> minutes
\t\t\t\t\t\t<input id=\"recipe_prep_time_min\" data-type=\"number\" type=\"hidden\" />
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<label for=\"cook_time_hours\">What is the cook time? </label>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<input id=\"cook_time_hours\" name=\"cook_time_hours\" class=\"input-small\" value=\"0\" /> hours 
\t\t\t\t\t\t<input id=\"cook_time_min\" name=\"cook_time_min\" class=\"input-small\" value=\"0\" /> minutes
\t\t\t\t\t\t<input type=\"hidden\" data-type=\"number\" id=\"recipe_cook_time_min\" />
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div style=\"display: inline-block; position: relative; top: 0px\">
\t\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t\t<label for=\"recipe_ingredient\">Ingredients: </label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t\t<input id=\"ingredient_input\" name=\"ingredient_input\" class=\"input-large\"/>
\t\t\t\t\t\t\t<div style=\"display: inline-block\">
\t\t\t\t\t\t\t\t<button class=\"add\" value=\"\" id=\"ingredient_btn\" onclick=\"updateList(this)\">add</button>
\t\t\t\t\t\t\t\t<input type=\"hidden\" data-type=\"array\" id=\"recipe_ingredients\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<ul id=\"ingredients_list\">
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"labelCol\" style=\"display: inline-block; position: relative; top: 0px\">
\t\t\t\t\t\t\t<label for=\"recipe_instructions\">Instructions: </label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t\t<input id=\"instructions_input\" name=\"instructions_input\" class=\"input-large\"/>
\t\t\t\t\t\t\t<div style=\"display: inline-block\">
\t\t\t\t\t\t\t\t<button class=\"add\" value=\"\" id=\"instructions_btn\" onclick=\"updateList(this)\">add</button>
\t\t\t\t\t\t\t\t<input type=\"hidden\" data-type=\"array\" id=\"recipe_instructions\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<ol id=\"instructions_list\">
\t\t\t\t\t\t\t</ol>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li id=\"fileUpload\">
\t\t\t\t\t<div class=\"labelCol\">
\t\t\t\t\t\t<span class=\"upload_text\">Upload Image:</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<div class=\"file_input\">
\t\t\t\t\t\t\t<input id=\"fileupload\" type=\"file\" name=\"files[]\" data-url=\"server/php/\"/>
\t\t\t\t\t\t\t<input type=\"hidden\" data-type=\"string\" id=\"recipe_main_photo\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t<span class=\"progress_icon\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"uploaded_file\">
\t\t\t\t\t\t\t<span></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"preview\"></div>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<div class=\"labelCol\">Additional comments:</div>
\t\t\t\t\t<div class=\"inputCol\">
\t\t\t\t\t\t<textarea id=\"recipe_notes\" cols=\"50\" rows=\"5\" data-type=\"string\"></textarea>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t<li class=\"submitContainer\">
\t\t\t\t\t<button id=\"submit\" onclick=\"submit()\">Submit!</button>
\t\t\t\t</li>
\t\t\t</ul>

\t\t<!--  File Upload -->
\t\t<div>


\t\t</div>
";
    }

    // line 133
    public function block_customScript($context, array $blocks = array())
    {
        // line 134
        echo "\t\t<script>
\t\t\t\$(document).ready(function () {
\t
\t\t\t\t\$('#fileupload').fileupload({
        \t\t\tsingleFileUploads: true,
        \t\t\tdataType: 'json',
        \t\t\tacceptFileTypes: /(\\.|\\/)(gif|jpe?g|png)\$/i,
        \t\t\tdone: function (e, data) {
            \t\t\$.each(data.result, function (index, file) {
                \t\t\$('<p/>').text(file.name).appendTo(document.body);
            \t\t});
        \t\t}
    \t\t});

   \t\t\$('#cook_time_hours, #cook_time_min, #prep_time_hours, #prep_time_min').change(function(){

\t\tif(\$(this).attr('id').indexOf('cook') >= 0)
\t\t\t{
\t\t\t\tvar totalMin = (Number(\$('#cook_time_hours').val()) * 60) + Number(\$('#cook_time_min').val());
\t\t\t\t\$('#recipe_cook_time_min').val(totalMin);
\t\t\t}
\t\t\telse if(\$(this).attr('id').indexOf('prep') >= 0)
\t\t\t{
\t\t\t\tvar totalMin = (Number(\$('#prep_time_hours').val()) * 60) + Number(\$('#prep_time_min').val());
\t\t\t\t\$('#recipe_prep_time_min').val(totalMin);
\t\t\t}
   \t\t});

    \tinitSubmittedDropdown();

    \t\$('#fileupload').bind('fileuploadfail', function (e, data) {alert('error!');});
   \t\t\$('#fileupload').bind('fileuploadstart', function(e, data) { start(); });
    \t\$('#fileupload').bind('fileuploaddone', function (e, data) { done(data);  });
    \t\$('#fileupload').bind('fileuploadprogress', function (e, data) { progressUpdate(data); });
\t\t});


\t\t</script>
";
    }

    public function getTemplateName()
    {
        return "submit.phtml";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 134,  180 => 133,  78 => 34,  65 => 33,  60 => 32,  27 => 3,);
    }
}

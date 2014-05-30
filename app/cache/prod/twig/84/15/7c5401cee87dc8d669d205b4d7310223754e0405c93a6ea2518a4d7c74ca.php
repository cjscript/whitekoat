<?php

/* AxonMedicineWhiteKoatBundle:Default:homepage.main.html.twig */
class __TwigTemplate_84157c5401cee87dc8d669d205b4d7310223754e0405c93a6ea2518a4d7c74ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:home.student.html.twig");

        $this->blocks = array(
            'libcontent' => array($this, 'block_libcontent'),
            'cardstylesheets' => array($this, 'block_cardstylesheets'),
            'cardprejavascripts' => array($this, 'block_cardprejavascripts'),
            'cardpostjavascripts' => array($this, 'block_cardpostjavascripts'),
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
        // line 11
        $this->displayBlock('cardprejavascripts', $context, $blocks);
        // line 261
        echo "
<div class=\"tab-content\">
    <link href=\"";
        // line 263
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/axonmedicinewhitekoat/css/cardSearch.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    
\t<form id=\"cardSearch\" action=\"\" autocomplete=\"off\">\t
\t\t<input type=\"text\" name=\"term\" id=\"cardSearchField\" placeholder=\"Drug or Disease\"/><input type=\"submit\" value=\"search\"/>
\t</form>
\t<div id=\"outerCardArea\">
\t\t<div id=\"cardAreaWrapper\">
\t\t\t<div id=\"cardArea\">
\t\t\t\t";
        // line 271
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["drugCards"]) ? $context["drugCards"] : $this->getContext($context, "drugCards")));
        foreach ($context['_seq'] as $context["_key"] => $context["drugCard"]) {
            // line 272
            echo "\t\t\t\t\t";
            $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:drugCard.html.twig")->display(array("card" => (isset($context["drugCard"]) ? $context["drugCard"] : $this->getContext($context, "drugCard"))));
            // line 273
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['drugCard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 274
        echo "\t\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diseaseCards"]) ? $context["diseaseCards"] : $this->getContext($context, "diseaseCards")));
        foreach ($context['_seq'] as $context["_key"] => $context["diseaseCard"]) {
            // line 275
            echo "\t\t\t\t\t";
            $this->env->loadTemplate("AxonMedicineWhiteKoatBundle:Default:diseaseCard.html.twig")->display(array("card" => (isset($context["diseaseCard"]) ? $context["diseaseCard"] : $this->getContext($context, "diseaseCard"))));
            // line 276
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diseaseCard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 277
        echo "\t\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["resultsCards"]) ? $context["resultsCards"] : $this->getContext($context, "resultsCards")));
        foreach ($context['_seq'] as $context["_key"] => $context["resultsCard"]) {
            // line 278
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, (isset($context["resultsCard"]) ? $context["resultsCard"] : $this->getContext($context, "resultsCard")), "html", null, true);
            echo "
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['resultsCard'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 280
        echo "\t\t\t\t
\t\t\t</div>
\t\t</div>
\t</div>
</div>


";
        // line 287
        $this->displayBlock('cardpostjavascripts', $context, $blocks);
        // line 475
        echo "

";
    }

    // line 5
    public function block_cardstylesheets($context, array $blocks = array())
    {
        // line 6
        echo "
<style type=\"text/css\">
\t
</style>
";
    }

    // line 11
    public function block_cardprejavascripts($context, array $blocks = array())
    {
        // line 12
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
\t\t\t\t\t\$(\"#cardSearchField\").val(ui.item.label);
\t\t\t\t\tconsole.log(ui.item.cardType);
\t\t\t\t\tif (ui.item.cardType === \"Drug\") {
\t\t\t\t\t\taddDrugCard(ui.item.cardId);
\t\t\t\t\t}
\t\t\t\t\telse if (ui.item.cardType === \"Disease\") {
\t\t\t\t\t\taddDiseaseCard(ui.item.cardId);
\t\t\t\t\t}
\t\t\t\t\telse if (ui.item.cardType === \"Symptom\") {
\t\t\t\t\t\taddResultsCard(ui.item.cardId, null);
\t\t\t\t\t}
\t\t\t\t\treturn false;
\t\t\t\t}
\t\t\t\t\t

\t\t\t})
\t\t\t/*.data(\"ui-autocomplete\")._renderItem = function(ul, item) {
\t\t\t\treturn \$(\"<li>\")
\t\t\t\t\t.append('<span class=\"cardName\">' + item.label + ': </span><span class=\"cardType\">' + item.cardType + '</span>')
\t\t\t\t\t.appendTo(ul);
\t\t\t};*/
\t\t});
\t\t
\t\t\$(\"#cardArea\").sortable({
\t\t\taxis: \"x\",
\t\t\trevert: false,
\t\t\tscroll: true,
\t\t\ttolerance: \"pointer\",
\t\t\tplaceholder: \"card cardPlaceholder\",
\t\t\tcontainment: \"#cardArea\",
\t\t\thandle: \".topBar\",
\t\t\topacity: .5,
\t\t\t/*delay: 250,*/
\t\t\tdistance:50,
\t\t\tscrollSensitivity:50,
\t\t\tscrollSpeed:100,
\t\t\tstart: function(e, ui){
\t\t\t\tremoveBubbles();
\t\t\t\tremoveVisibleMenus();
\t\t\t\tui.placeholder.width(ui.item.width()).height(ui.item.height());
\t\t\t\tui.item.float=true;
\t\t\t}/*,
\t\t\tchange: function (e,ui){
\t\t\t\tvar \$placeholder = \$(ui.placeholder);
\t\t\t\t\$placeholder.hide().show(300);
\t\t\t\t
\t\t\t}*/
\t\t});
\t\t//\$('#cardArea').disableSelection();
\t\t/*\$('#cardArea').find('.card').draggable({
\t\t\t\taxis: \"x\",
\t\t\t\tconnectToSortable: \"#cardArea\"});*/
\t\t
\t\t

\t\t\$('.hamburgerSubNav').menu();
\t\t
\t\t\t\t
\t});
\t
\tfunction updateCardAreaWidth(direction) {
\t\tvar \$cardArea = \$(\"#cardArea\");
\t\tvar \$cards = \$cardArea.find(\".card\");
\t\tvar width = \$cardArea.parent('#cardAreaWrapper').width();
\t\tif (\$cards.length > 0) {
\t\t\twidth = 0;
\t\t\t\$cards.each(function() {
\t\t\t\tvar \$card = \$(this);
\t\t\t\twidth += \$card.outerWidth(true);
\t\t\t});
\t\t\twidth += 15;
\t\t}
\t\tif (direction==\"collapse\") {
\t\t\t\$cardArea.animate({\"width\":width},400);
\t\t} else {
\t\t\t\$cardArea.width(width);
\t\t}
\t}
\t
\tfunction scrollToCard(\$card) {
\t\t\$card = \$(\$card);
\t\tvar \$cardAreaWrapper = \$(\"#cardAreaWrapper\");
\t\tvar pos = \$card.position();
\t\tconsole.log(pos, \$card);
\t\t\$cardAreaWrapper.animate({scrollLeft:pos.left},800);
\t}

\t
\tfunction addDrugCard(cardId) {
\t\t\$.ajax({
\t\t\turl: 'home/drugCard',
\t\t\tdata: {
\t\t\t\tid: cardId
\t\t\t},
\t\t\tdataType: 'text'
\t\t}).done(function (response) {
\t\t\tvar \$card = \$(response);
\t\t\t\$card.find('.hamburgerSubNav').menu();
\t\t\taddCard(\$card, null);
\t\t}).fail(function (response) {
\t\t\tconsole.log(\"Something went wrong with the drug card.\");
\t\t});
\t};
\tfunction addDiseaseCard(cardId) {
\t\t\$.ajax({
\t\t\turl: 'home/diseaseCard',
\t\t\tdata: {
\t\t\t\tid: cardId
\t\t\t},
\t\t\tdataType: 'text'
\t\t}).done(function (response) {
\t\t\tvar \$card = \$(response);
\t\t\t\$card.find('.hamburgerSubNav').menu();
\t\t\taddCard(\$card, null);
\t\t}).fail(function (response) {
\t\t\tconsole.log(\"Something went wrong with the disease card.\");
\t\t});
\t};
\tfunction addResultsCard(cardId, forEntry) {
        \$.ajax({
\t\t\turl: 'home/resultsCard',
\t\t\tdata: {
                            id: cardId
\t\t\t},
\t\t\tdataType: 'text'
\t\t}).done(function (response) {
\t\t\tvar \$forEntry = \$(forEntry);
\t\t\tvar \$card = \$(response);
                                                
\t\t\taddCard(\$card, \$forEntry);
\t\t}).fail(function (response) {
\t\t\tconsole.log(\"Something went wrong with the results card.\");
\t\t});
\t};
\t
\tfunction addCard(\$card, \$forEntry) {

\t\tif (\$forEntry && \$forEntry.length>=1) {
\t\t\tvar \$forCard = \$forEntry.closest(\".card\");
\t\t\t\$forCard.after(\$card);
\t\t} else {
\t\t\t\$('#cardArea').append(\$card);
\t\t}
\t\t
\t\t//hide 
\t\t\$card.hide();
\t\t\$card.show();

\t\tupdateCardAreaWidth();
\t\tscrollToCard(\$card);
\t\t\$card.hide();
\t\t\$card.toggle( \"drop\" );
\t\t//history.replaceState(null, \"\", \"?drugCard[]=\" + cardId);
\t}
\t
\t
\$(document).ready(function() {
\tvar \$cardArea = \$(\"#cardArea\");
\tupdateCardAreaWidth(null);
\t
\t\$cardArea.on('click', '.closeButton', function(e) {
\t\t\$removeThis = \$(this).closest(\".card\");
\t\t\$removeThis.toggle(\"drop\", function() {
\t\t\t\$removeThis.remove();
\t\t\tupdateCardAreaWidth(\"collapse\");
\t\t});
\t\tupdateCardAreaWidth(\"collapse\");
\t});
\t
\t\$cardArea.on('mouseenter', '.topRightButtons>a', function(e) {
\t\tvar \$this = \$(this);
\t\t\$this.siblings('.buttonTitle').html(\$this.data('tooltip'));
\t}).on('mouseleave', '.topRightButtons>a', function(e) {
\t\t\$(this).siblings('.buttonTitle').html(\"&nbsp;\");
\t});
\t
\t// maximize button
\t\$cardArea.on('click', '.maximizeButton', function(e) {
\t\tvar animationDuration = 400;
\t\tvar \$cardInfo = \$(this).closest('.cardInfo');
\t\tvar \$siblings = \$cardInfo.siblings('.cardInfo');
\t\tvar \$allCardInfo = \$.merge(\$.merge(\$(), \$cardInfo), \$siblings);
\t\t\$cardInfo.parent().css({\"position\":\"relative\",\"display\":\"block\"});
\t\tvar newTop = Math.min.apply(null, \$allCardInfo.map(function() {return \$(this).position().top;}));
\t\tvar curPos = \$cardInfo.position();
\t\t
\t\tif (\$cardInfo.hasClass(\"maximized\")) {
\t\t\tnewTop = \$cardInfo.data('initialPosition').top;  
\t\t} else {
\t\t\t
\t\t\t\$allCardInfo.each(function(index, value) { // store current positions before we start messing with them
\t\t\t\tvar \$this = \$(this), pos = \$this.position();
\t\t\t\t
\t\t\t\tif (\$this.css('position') != 'absolute') {
\t\t\t\t\t\t//move top position by 10px to fix jump on first maximize, source of which is currently unknown
\t\t\t\t\t\tpos.top -= 10;
\t\t\t\t\t\t
\t\t\t\t\t\t//also, this one moves by a little bit on the first maximize
\t\t\t\t\t\tif( index === 0 ) {
\t\t\t\t\t\t\tnewTop -= 10;
\t\t\t\t\t\t}
\t\t\t\t}
\t\t\t\t
\t\t\t\t\$this.data('initialPosition', pos);
\t\t\t});
\t\t\t\$allCardInfo.each(function() { // mess with positions
\t\t\t\tvar \$this = \$(this), pos;
\t\t\t\tpos = \$this.data('initialPosition');
\t\t\t\t\$this.css({\"position\":\"absolute\", \"left\": pos.left, \"top\":pos.top});
\t\t\t});
\t\t}
\t\t\$cardInfo.toggleClass(\"maximized\");
\t\t\$cardInfo.animate({\"top\":newTop},animationDuration, \"swing\", function() {
\t\t\t
\t\t});
\t\t\$siblings.toggle(\"drop\",{direction:\"up\"});
\t});\t
});
\t
\t
\t
\t
</script>
";
    }

    // line 287
    public function block_cardpostjavascripts($context, array $blocks = array())
    {
        // line 288
        echo "\t<script type=\"text/javascript\">
\t\t\$(\"#cardSearch\").submit(function(event) {
\t\t\taddTextSearchedCard(\$(\"#cardSearch\").serialize());
\t\t\tevent.preventDefault();
\t\t\treturn false;
\t\t});
\t\t
\t\t\$('#cardArea').on(\"click\", \".hamburger\", function(e) {
\t\t\te.stopPropagation();
\t\t\tvar animationDuration = 400;
\t\t\tvar \$this = \$(this);
\t\t\tvar existingMenu = \$this.closest('.card').find('.visibleMenu');
\t\t\t
\t\t\t//checks to see if a menu is showing right now
\t\t\tif ( existingMenu.length > 0) {
\t\t\t\tremoveVisibleMenus();
\t\t\t}
\t\t\telse {
\t\t\t\tvar \$card = \$this.closest('.card');
\t\t\t\tvar \$menu = \$this.siblings('.hamburgerSubNav').clone(true);
\t\t\t\tconsole.log(\$menu.offsetParent());
\t\t\t\t\$menu.addClass('visibleMenu');
\t\t\t\t/*menu.position({
\t\t\t\t\tmy: \"left top\",
\t\t\t\t\tat: \"left bottom\",
\t\t\t\t\tof: this,
\t\t\t\t\tcollision: \"none\"
\t\t\t\t});*/
\t\t\t\tvar pos = \$this.position();
\t\t\t\tpos.top += \$this.outerHeight(true);
\t\t\t\tpos.left += parseInt(\$this.css(\"marginLeft\"));
\t\t\t\t\$menu.css({\"position\":\"absolute\",\"top\":pos.top,\"left\":pos.left});
\t\t\t\t
\t\t\t\t\$this.after(\$menu);
\t\t\t\t\$menu.hide();
\t\t\t\t\$menu.show(animationDuration);
\t\t\t\t
\t\t\t}
\t\t});
\t\t
\t\tfunction removeVisibleMenus() {
\t\t\tvar \$visibleMenus = \$('.visibleMenu');
\t\t\t\$visibleMenus.hide(400, function() {
\t\t\t\t\$visibleMenus.remove();
\t\t\t});
\t\t}
\t\t
\t\t\$(document).on({
\t\t   click: function(){
\t\t\t\tremoveVisibleMenus();
\t\t\t\tremoveBubbles();
\t\t   }
\t\t});
\t\t
\t\t\$('.bubble').on(\"click\", \".bubble\", function(e) {
\t\t\te.stopPropagation();
\t\t\tremoveVisibleMenus();
\t\t});
\t\t
\t\t
\t\tfunction removeBubbles() {
\t\t\tvar \$bubbles = \$('.bubble');
\t\t\t\$bubbles.hide(400, function() {
\t\t\t\t\$bubbles.remove();
\t\t\t});
\t\t}
\t\t
\t\tfunction addTextSearchedCard(searchTerm) {
\t\t\t\$.ajax({
\t\t\t\turl: 'home/cardByName',
\t\t\t\tdata: searchTerm,
\t\t\t\tdataType: 'json'
\t\t\t}).done(function (response) {
\t\t\t\tvar id = response['id'];
\t\t\t\tvar type = response['type'];
\t\t\t\tif (type == \"Drug\") {
\t\t\t\t\taddDrugCard(id);
\t\t\t\t}
\t\t\t\telse if (type == \"Disease\") {
\t\t\t\t\taddDiseaseCard(id);
\t\t\t\t}

\t\t\t}).fail(function (response) {
\t\t\t\tconsole.log(\"Something went wrong with the text searched card.\");
\t\t\t});
\t\t};
\t\t
\t\tfunction addLibValCard(cardId) {
\t\t\t\$.ajax({
\t\t\t\turl: 'home/libValueCard',
\t\t\t\tdata: {
\t\t\t\t\tid: cardId
\t\t\t\t},
\t\t\t\tdataType: 'text'
\t\t\t}).done(function (response) {
\t\t\t\tvar \$card = \$(response);
\t\t\t\t\$('#cardArea').append(\$card);
\t\t\t\tupdateCardAreaWidth();
\t\t\t\tscrollToCard(\$card);
\t\t\t}).fail(function (response) {
\t\t\t\tconsole.log(\"Something went wrong with the lib value card.\");
\t\t\t});
\t\t};
\t
\t\t\$('#cardArea').on(\"click\", '.descriptionLink', function(e) {
\t\t\te.stopPropagation();
\t\t\tvar \$this = \$(this);
\t\t\tvar id = \$(this).data(\"libraryid\");
\t\t\tvar \$placementElement = \$this.closest('.libValLinkContainer').find('.hamburger');
\t\t\tvar \$container = \$this.closest('.cardInfo');
\t\t\t
\t\t\t\$.ajax({
\t\t\t\turl: 'home/libValueCard',
\t\t\t\tdata: {
\t\t\t\t\tid: id
\t\t\t\t},
\t\t\t\tdataType: 'text'
\t\t\t}).done(function (response) {
\t\t\t\tvar \$bubble = \$(\$.parseHTML(response));
\t\t\t\tvar pos = \$placementElement.position();
\t\t\t\t\$container.append(\$bubble)
\t\t\t\tconsole.log(pos);
\t\t\t\tconsole.log(\$bubble.outerHeight(true));
\t\t\t\tconsole.log(\$placementElement.outerWidth(true));
\t\t\t\tpos.left += \$placementElement.outerWidth(true);
\t\t\t\t\$bubble.css({\"position\":\"absolute\",\"left\":pos.left});
\t\t\t\t//height of will change due to new line wrapping after moving along the x-axis
\t\t\t\t//need to place x-axis, calculate height, then position y-axis
\t\t\t\tpos.top -= \$bubble.outerHeight(true);
\t\t\t\t\$bubble.css({\"top\":pos.top});
\t\t\t\t\$bubble.hide();
\t\t\t\t\$bubble.show(400);
\t\t\t\tremoveVisibleMenus();
\t\t\t}).fail(function (response) {
\t\t\t\tconsole.log(\"Something went wrong with the lib value card.\");
\t\t\t});
\t\t});
\t\t
\t\t\$('#cardArea').on(\"click\", '.imageLink', function(e) {
\t\t\te.stopPropagation();
\t\t\tvar \$this = \$(this);
\t\t\tvar id = \$(this).data(\"libraryid\");
\t\t\tvar \$placementElement = \$this.closest('.card');
\t\t\t
\t\t\t\$.ajax({
\t\t\t\turl: 'home/imageCard',
\t\t\t\tdata: {
\t\t\t\t\tid: id
\t\t\t\t},
\t\t\t\tdataType: 'text'
\t\t\t}).done(function (response) {
\t\t\t\tvar \$imageCard = \$(\$.parseHTML(response));
\t\t\t\taddCard(\$imageCard, \$placementElement);
\t\t\t\tremoveVisibleMenus();
\t\t\t}).fail(function (response) {
\t\t\t\tconsole.log(\"Something went wrong with the image card.\");
\t\t\t});
\t\t});
\t\t
\t\t
\t\t\$(document).ready(function() {
\t\t\tvar showTabFunction = function(tabSelector) {
\t\t\t\tvar \$this = \$(this);
\t\t\t\tvar \$cardContent = \$this.closest(\".cardContent\");
\t\t\t\t\$cardContent.find(\".cardTab\").hide();
\t\t\t\t\$cardContent.find(tabSelector).show();
\t\t\t\t\$this.siblings(\".btn\").switchClass(\"btn-primary\", \"btn-default\");
\t\t\t\t\$this.switchClass(\"btn-default\", \"btn-primary\");
\t\t\t}
\t\t\t\$(\"#cardArea\").on(\"click\", \"div.card button.overviewBtn\", function() {
\t\t\t\tshowTabFunction.call(this, \".overviewTab\");
\t\t\t});
\t\t\t\$(\"#cardArea\").on(\"click\", \"div.card  button.infoBtn\", function() {
\t\t\t\tshowTabFunction.call(this, \".infoTab\");
\t\t\t});
\t\t\t\$(\"#cardArea\").on(\"click\", \"div.card  button.detailsBtn\", function() {
\t\t\t\tshowTabFunction.call(this, \".detailsTab\");
\t\t\t});
\t\t\t\$(\"#cardArea\").on(\"click\", \"div.card  button.highYieldBtn\", function() {
\t\t\t\tshowTabFunction.call(this, \".highYieldTab\");
\t\t\t});
\t\t});
\t\t
\t\t
\t</script>

";
    }

    // line 479
    public function block_tablecontent($context, array $blocks = array())
    {
        // line 480
        echo "

";
    }

    public function getTemplateName()
    {
        return "AxonMedicineWhiteKoatBundle:Default:homepage.main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  577 => 480,  574 => 479,  384 => 288,  381 => 287,  129 => 12,  126 => 11,  118 => 6,  115 => 5,  109 => 475,  107 => 287,  98 => 280,  89 => 278,  84 => 277,  78 => 276,  75 => 275,  70 => 274,  64 => 273,  61 => 272,  57 => 271,  46 => 263,  42 => 261,  40 => 11,  38 => 5,  35 => 4,  32 => 3,);
    }
}

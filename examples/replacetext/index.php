<?PHP

include "../index.php";

$shell['title3'] = "replaceText";

$shell['h2'] = 'String replace for your jQueries!';

// ========================================================================== //
// SCRIPT
// ========================================================================== //

ob_start();
?>
$(function(){
  
  $('.link1').click(function(){
    // Replace all 'text' words with 'TEXT'
    
    $('#test *').replaceText( /\btext\b/gi, 'TEXT' );
  });
  
  $('.link2').click(function(){
    // Wrap all 'this' words in quotes.
    
    $('#test *').replaceText( /\b(this)\b/gi, '"$1"' );
  });
  
  $('.link3').click(function(){
    // Wrap all 'text' words with <span class="red"/>
    
    $('#test').find(':not(textarea)')
      .replaceText( /\b(text)\b/gi, '<span class="red">$1<\/span>' );
  });
  
  $('.link4').click(function(){
    // Wrap all 'a' words, not already wrapped, with <b>, but as text only
    
    $('#test *').replaceText( /(?!<b>)\b(a)\b(?!<\/b>)/gi, '<b>$1<\/b>', true );
  });
  
  $('.link5').click(function(){
    // Wrap all words starting with 'li' with <span class="green"/>, but only if
    // they aren't already wrapped in a span with class of green
    
    function colorize( str ) {
      return '<span class="green">' + str + '<\/span>';
    };
    
    $('#test').find(':not(textarea):not(span.green)')
      .replaceText( /\bli.*?\b/gi, colorize );
  });
  
});
<?
$shell['script'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML HEAD ADDITIONAL
// ========================================================================== //

ob_start();
?>
<script type="text/javascript" src="../../jquery.ba-replacetext.js"></script>
<script type="text/javascript" language="javascript">

<?= $shell['script']; ?>

$(function(){
  
  // Syntax highlighter.
  SyntaxHighlighter.highlight();
  
  // Prevent all the #nav links from navigating.
  $('#nav a').click(function(e){
    e.preventDefault();
  });
  
});

</script>
<style type="text/css" title="text/css">

/*
bg: #FDEBDC
bg1: #FFD6AF
bg2: #FFAB59
orange: #FF7F00
brown: #913D00
lt. brown: #C4884F
*/

#page {
  width: 700px;
}

.green {
  color: #0a0;
  border: 1px solid #0a0;
  padding: 1px;
}

.red {
  color: #f00;
  border: 1px solid #f00;
  padding: 1px;
}

#test input,
#test textarea {
  border: 1px solid #000;
}

#test textarea {
  width: 30em;
  height: 5em;
  margin-top: 0.6em;
}

</style>
<?
$shell['html_head'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML BODY
// ========================================================================== //

ob_start();
?>
<?= $shell['donate']; ?>

<p>
  <a href="http://benalman.com/projects/jquery-replacetext-plugin/">jQuery replaceText</a> will replace text in specified elements. Note that only text content will be modified, leaving all tags and attributes untouched.
</p>

<h3>Click these links:</h3>

<ol id="nav">
  <li><a href="#" class="link1">Replace all 'text' words with 'TEXT'</a></li>
  <li><a href="#" class="link2">Wrap all 'this' words in quotes.</a> (try clicking multiple times)</li>
  <li><a href="#" class="link3">Wrap all 'text' words with &lt;span class="red"/&gt;</a> (try clicking multiple times)</li>
  <li><a href="#" class="link4">Wrap all 'a' words, not already wrapped, with &lt;b/&gt;, but as text only</a> (try clicking multiple times)</li>
  <li><a href="#" class="link5">Wrap all words starting with 'li' with &lt;span class="green"/&gt;, but only if they aren't already wrapped in a span with class of green</a> (try clicking multiple times)</li>
</ol>

<h3>To modify this HTML:</h3>

<div id="test">
  <!-- this is a comment -->
  <p>This is some text that contains <a href="#">a link with <i>italic text</i> and <b>bold text</b></a> as well as a <span class="test">span with a class of test</span>.</p>
  <ol>
    <li>this listitem is just text</li>
    <li>but this one has <a href="#">a link with <i>italic text</i> and <b>bold text</b></a> and some more text</li>
    <li>
      and this listitem has some text and an unordered list
      <ul>
        <li>this listitem is just text</li>
        <li>but this one has <a href="#">a link with <i>italic text</i> and <b>bold text</b></a> and some more text</li>
      </ul>
      followed by some more text
    </li>
  </ol>
  <form action="" method="get">
    <input type="text" name="a" value="an input with some text"><br>
    <textarea name="b">This is just a little bit of sample text, in a textarea. Very exciting!</textarea>
  </form>
  <p>And one last paragraph to wrap this example up!</p>
</div>

<h3>The code</h3>

<pre class="brush:js">
<?= htmlspecialchars( $shell['script'] ); ?>
</pre>

<?
$shell['html_body'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// DRAW SHELL
// ========================================================================== //

draw_shell();

?>

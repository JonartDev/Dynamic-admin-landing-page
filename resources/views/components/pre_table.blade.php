<!-- Hidden textarea for clipboard operations -->
<textarea id="clipboard_text" style="position: absolute; left: -9999px;"></textarea>

@switch($sidebar_id)
@case(1)
<pre id="copy_code" style="color:#2e66a3; background-color:white; cursor: pointer; " title="Click to copy this code">
&#64;foreach($banner as $item)
    &#64;if($item-&gt;_group == 1) // value of _group is based on your configuration
        &lt;a href="&#123;&#123;$item-&gt;links&#125;&#125;" target="_blank"&gt;
            &lt;img src="&#123;&#123; asset('storage/'.$item->image_path)&#125;&#125;" alt="{$item->name}"&gt;
        &lt;/a&gt;
    &#64;endif
&#64;endforeach
</pre>
@break

@case(2)
<pre id="copy_code" style="color:#2e66a3; background-color:white; cursor: pointer; " title="Click to copy this code">
&#64;foreach($links as $item)
    &#64;if($item-&gt;_group == 1) // value of _group is based on your configuration
        &lt;a href="&#123;&#123;$item-&gt;links&#125;&#125;" target="_blank"&gt;
            &lt;img src="&#123;&#123; asset('storage/'.$item->image_path)&#125;&#125;" alt="{$item->name}"&gt;
        &lt;/a&gt;
    &#64;endif
&#64;endforeach
</pre>
@break

@case(3)
<pre id="copy_code" style="color:#2e66a3; background-color:white; cursor: pointer; " title="Click to copy this code">
&#64;foreach($buttons as $item)
    &#64;if($item-&gt;_group == 1) // value of _group is based on your configuration
        &lt;a href="&#123;&#123;$item-&gt;links&#125;&#125;" target="_blank"&gt;
            &lt;img src="&#123;&#123; asset('storage/'.$item->image_path)&#125;&#125;" alt="{$item->name}"&gt;
        &lt;/a&gt;
    &#64;endif
&#64;endforeach
</pre>
@break

@default
{{ __('translate.buttons') }}
@endswitch

<i id="copy_icon" class="fas fa-solid fa-check" style="display: none; margin-right: 5px;"> Copied!</i>

<script>
    document.getElementById("copy_code").addEventListener("click", function() {
        copyText();
    });

    function copyText() {
        /* Get the text from the 'copy_code' pre element */
        var originalText = document.getElementById("copy_code").innerText;

        /* Set the text content to the hidden textarea */
        document.getElementById("clipboard_text").value = originalText;

        /* Copy text into clipboard from the hidden textarea */
        document.getElementById("clipboard_text").select();
        document.execCommand("copy");

        // Display the copy icon
        var copyIcon = document.getElementById("copy_icon");
        copyIcon.style.display = "inline";

        // Update content to indicate copied
        document.getElementById("copy_code").innerText = '';

        setTimeout(function() {
            // Reset content to the original text
            document.getElementById("copy_code").innerText = originalText;
            copyIcon.style.display = "none";
        }, 1000);
    }
</script>
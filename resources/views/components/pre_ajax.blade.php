<!-- Hidden textarea for clipboard operations -->
<textarea id="clipboard_text" style="position: absolute; left: -9999px;"></textarea>
<!-- Icon for copy -->
@switch($sidebar_id)
@case(1)
<pre id="copy_ajax" style="color:#2e66a3; background-color:white; cursor: pointer; " title="Click to copy this code">
$.ajax({
    url: "&#123;&#123; route('get.banner') &#125;&#125;",
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        bannerUI(data);
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.error("Error fetching data:", error);
    }
});

function bannerUI(data) {
    var desktopImages = [];
    var mobileImages = [];
    data.forEach(function(item) {
        var image = {
            src: 'storage/' + item.image_path,
            isMobile: item.isMobile
        };
        if (image.isMobile === 0) {
            desktopImages.push(image);
        } else if (image.isMobile === 1) {
            mobileImages.push(image);
        }
    });
    updateSwiper(".mySwiperDesktop", desktopImages);
    updateSwiper(".mySwiperMobile", mobileImages);
}
</pre>
@break
@case(2)
<pre id="copy_ajax" style="color:#2e66a3; background-color:white; cursor: pointer; " title="Click to copy this code">
$.ajax({
    url: "&#123;&#123; route('get.link') &#125;&#125;",
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        linkUI(data);
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.error("Error fetching data:", error);
    }
});

function linkUI(data) {
    var desktopImages = [];
    var mobileImages = [];
    data.forEach(function(item) {
        var image = {
            src: 'storage/' + item.image_path,
            isMobile: item.isMobile
        };
        if (image.isMobile === 0) {
            desktopImages.push(image);
        } else if (image.isMobile === 1) {
            mobileImages.push(image);
        }
    });
    updateSwiper(".mySwiperDesktop", desktopImages);
    updateSwiper(".mySwiperMobile", mobileImages);
}
</pre>
@break
@case(3)
<pre id="copy_ajax" style="color:#2e66a3; background-color:white; cursor: pointer; " title="Click to copy this code">
$.ajax({
    url: "&#123;&#123; route('get.button') &#125;&#125;",
    method: 'GET',
    dataType: 'json',
    success: function(data) {
        buttonUI(data);
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.error("Error fetching data:", error);
    }
});

function buttonUI(data) {
    var desktopImages = [];
    var mobileImages = [];
    data.forEach(function(item) {
        var image = {
            src: 'storage/' + item.image_path,
            isMobile: item.isMobile
        };
        if (image.isMobile === 0) {
            desktopImages.push(image);
        } else if (image.isMobile === 1) {
            mobileImages.push(image);
        }
    });
    updateSwiper(".mySwiperDesktop", desktopImages);
    updateSwiper(".mySwiperMobile", mobileImages);
}
</pre>
@break
@default
{{ __('translate.buttons') }}
@endswitch

<i id="copy_ajax_icon" class="fas fa-solid fa-check" style="display: none; margin-right: 5px;"> Copied!</i>
<script>
    document.getElementById("copy_ajax").addEventListener("click", function() {
        copyText();
    });

    function copyText() {
        /* Get the text from the 'copy_ajax' pre element */
        var originalText = document.getElementById("copy_ajax").innerText;

        /* Set the text content to the hidden textarea */
        document.getElementById("clipboard_text").value = originalText;

        /* Copy text into clipboard from the hidden textarea */
        document.getElementById("clipboard_text").select();
        document.execCommand("copy");

        // Display the copy icon
        var copyIcon = document.getElementById("copy_ajax_icon");
        copyIcon.style.display = "inline";
        // Update content to indicate copied
        document.getElementById("copy_ajax").innerText = '';

        setTimeout(function() {
            // Reset content to the original text
            document.getElementById("copy_ajax").innerText = originalText;
            copyIcon.style.display = "none";
        }, 1000);
    }
</script>
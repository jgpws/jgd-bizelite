/* The scripts on this page are licensed under the GNU General Public License */
/* See https://www.gnu.org/licenses/gpl.html for more information */

// jQuery.noConflict();
// Use jQuery via jQuery(...)

(function ($) {
  /* menubar */
  const jgd_bizelite_menubar_dropdowns = () => {
    const menuItems = document.querySelectorAll(".menubar-list-item");

    menuItems.forEach((item) => {
      const pagemenu = item.querySelector(".pagemenu");
      const menuTitle = item.querySelector(".menubar-title");

      if (pagemenu && menuTitle) {
        const menuId = pagemenu.id; // Captures 'menu-one' or 'menu-two'
        pagemenu.style.maxHeight = "0px";

        const btn = document.createElement("button");
        btn.className = "button-dropdown";
        btn.setAttribute("type", "button");
        btn.setAttribute("aria-haspopup", "true");
        btn.setAttribute("aria-controls", menuId);
        btn.setAttribute("aria-expanded", "false");
        btn.setAttribute("aria-label", "Toggle menu");

        // Inject after the menubar-title
        menuTitle.after(btn);

        // Add the click event
        btn.addEventListener("click", () => {
          const isExpanding = btn.getAttribute("aria-expanded") === "false";

          // Update ARIA state
          btn.setAttribute("aria-expanded", isExpanding);

          if (isExpanding) {
            // Expand: Remove class and set max-hieght to the scrollable height
            pagemenu.classList.remove("is-zero-height");
            pagemenu.style.maxHeight = pagemenu.scrollHeight + "px";
          } else {
            // Collapse: Set max-height back to 0 and re-add class
            pagemenu.style.maxHeight = "0px";
            pagemenu.classList.add("is-zero-height");
          }
        });
      }
    });
  };

  jgd_bizelite_menubar_dropdowns();

  // Hide .pagemenu and .catmenu when clicking outside of menus
  // Thanks go to prc322 on this Stack Overflow page for this variation
  // http://stackoverflow.com/questions/1403615/use-jquery-to-hide-a-div-when-the-user-clicks-outside-of-it

  const menuItems = $(".menubar-list-item");
  pageMenu = $(".pagemenu");

  $(document).click(function (e) {
    if (
      !menuItems.is(e.target) &&
      menuItems.has(e.target).length === 0 // if the target of the click is not the container.
    ) {
      $(this).find(pageMenu).addClass("is-zero-height");
    }
  });

  /* primary and secondary sidebars */

  const jgd_bizelite_sidebar_dropdowns = () => {
    // find every second li tag that has ul below and add button .button-dropdown--light
    const sidebarListItemLinks = document.querySelectorAll(
      ".widget > ul> li:has(.children) > a, .wp-widget-group__inner-blocks > ul > li:has(.children) > a, .widget .menu > li:has(.sub-menu) > a, .widget .wp-block-page-list > .has-child > a",
    );

    const sidebarInnerUls = document.querySelectorAll(
      ".widget > ul > li ul:first-of-type, .widget .menu .sub-menu",
    );

    sidebarListItemLinks.forEach((link) => {
      const parentLi = link.closest("li");
      const subMenu = parentLi.querySelector("ul");

      if (subMenu) {
        const menuId =
          subMenu.id ||
          "sidebar-menu-" + Math.random().toString(36).substring(2, 9);
        subMenu.id = menuId; // Ensure it has an ID

        // Hide the menu initially
        subMenu.classList.add("is-zero-height");
        subMenu.style.maxHeight = "0px";
        subMenu.style.visibility = "hidden";

        const btn = document.createElement("button");
        btn.className = "button-dropdown--light";
        btn.setAttribute("type", "button");
        btn.setAttribute("aria-controls", menuId);
        btn.setAttribute("aria-expanded", "false");
        btn.setAttribute("aria-label", "Toggle menu");

        link.after(btn);
      }
    });

    document.addEventListener("click", (e) => {
      if (e.target.classList.contains("button-dropdown--light")) {
        const btn = e.target;
        const menuId = btn.getAttribute("aria-controls");
        const subMenu = document.getElementById(menuId);

        if (subMenu) {
          const isExpanding = btn.getAttribute("aria-expanded") === "false";

          // Toggle ARIA
          btn.setAttribute("aria-expanded", isExpanding);

          if (isExpanding) {
            subMenu.classList.remove("is-zero-height");
            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
            subMenu.style.visibility = "visible";
          } else {
            subMenu.style.maxHeight = "0px";
            subMenu.classList.add("is-zero-height");
            subMenu.style.visibility = "hidden";
          }
        }
      }
    });
  };

  jgd_bizelite_sidebar_dropdowns();

  // Global Escape key listener
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      // Find any button that is currently expanded
      const openButton = document.querySelector(
        '.button-dropdown[aria-expanded="true"]',
      );
      const openSocialPanelButton = document.querySelector(
        '.menu-social .button-dropdown[aria-expanded="true"]',
      );

      if (openButton) {
        const menuId = openButton.getAttribute("aria-controls");
        const menu = document.getElementById(menuId);

        // Close the menu
        openButton.setAttribute("aria-expanded", "false");

        if (menu) {
          menu.style.maxHeight = "0px";
          menu.classList.add("is-zero-height");
        }

        // Return focus to the button
        openButton.focus();
      }

      if (openSocialPanelButton) {
        const socialMenu = document.getElementById("menu-social-items");

        socialMenu.setAttribute("aria-expanded", "false");
        socialMenu.classList.remove("is-expanded", "social-panel-expand");
      }
    }
  });

  // Up and down button script to scroll to top and down to sidebar in tablet widths and below
  /* adapted from the code from the article "Using jQuery to add a dynamic Back To Top floating button with smooth scroll". See http://www.developerdrive.com/2013/07/using-jquery-to-add-a-dynamic-back-to-top-floating-button-with-smooth-scroll/ */

  var windowWidth = $(window).width();

  function animateUpDownButtons() {
    var offset = 100;
    var duration250 = 250;
    var duration100 = 100;
    var upDownButtons = "#footer #up-down-buttons";
    var toTop = "#footer #to-top";
    var toBottom = "#footer #to-bottom";
    var sidebar = $("#sidebar");
    var footer = $("#footer");

    $(upDownButtons).css({ right: "-72px" });

    $(window).scroll(function () {
      if ($(this).scrollTop() > offset) {
        $(upDownButtons).animate({ right: "0px" }, duration250);
      } else {
        $(upDownButtons).animate({ right: "-72px" }, duration100);
      }
    });

    $(toTop).click(function (event) {
      event.preventDefault();
      $("html, body").animate({ scrollTop: 0 }, duration250);
      return false;
    });

    if (sidebar.length) {
      $(toBottom).click(function (event) {
        event.preventDefault();
        $("html, body").animate(
          { scrollTop: sidebar.offset().top },
          duration250,
        );
      });
    }

    // If no sidebar on the page, then go to the footer
    if (!sidebar.length) {
      $(toBottom).click(function (event) {
        event.preventDefault();
        $("html, body").animate(
          { scrollTop: footer.offset().top },
          duration250,
        );
      });
    }
  }
  $(window).load(animateUpDownButtons());

  // Add separator to navigation dynamically, as WordPress's the_posts_navigation function does not support separators
  var navPrevious = ".nav-previous";

  $(navPrevious).after('<span class="nav-separator"></span>');

  /* For the social media buttons in the header */
  /* This uses a modification of the method used in the tutorial "Social nav menus: Part 2" by Justin Tadlock */
  /* using the Themify icons for the social icons */
  /* http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2 */
  function socialMediaButtons() {
    if ($("#menu-social").length) {
      var fbLink = $('#menu-social li a[href*="facebook.com"]');
      var twLink = $('#menu-social li a[href*="twitter.com"]');
      var instLink = $('#menu-social li a[href*="instagram.com"]');
      var pntLink = $('#menu-social li a[href*="pinterest.com"]');
      var ytLink = $('#menu-social li a[href*="youtube.com"]');
      var vimLink = $('#menu-social li a[href*="vimeo.com"]');
      var flkLink = $('#menu-social li a[href*="flickr.com"]');
      var gthbLink = $('#menu-social li a[href*="github.com"]');
      var gpLink = $('#menu-social li a[href*="plus.google.com"]');
      var tmbLink = $('#menu-social li a[href*="tumblr.com"]');
      var wpLink = $(
        '#menu-social li a[href*="wordpress.com"], #menu-social li a[href*="wordpress.org"]',
      );

      fbLink.addClass("ti-facebook");
      twLink.addClass("ti-twitter-alt");
      instLink.addClass("ti-instagram");
      pntLink.addClass("ti-pinterest");
      gthbLink.addClass("ti-github");
      flkLink.addClass("ti-flickr-alt");
      gpLink.addClass("ti-google");
      tmbLink.addClass("ti-tumblr-alt");
      wpLink.addClass("ti-wordpress");
      ytLink.addClass("ti-youtube");
      vimLink.addClass("ti-vimeo-alt");
    }
  }
  $(window).load(socialMediaButtons());

  socialButtonUl = $("#menu-social-items");
  socialPanel = $(".menu-social");

  socialPanel.append(
    '<button class="button-dropdown" aria-label="Expand social media button panel"></button>',
  );

  function hideOverflow() {
    socialButtonUl.addClass("is-collapsed").removeClass("is-expanded");
  }

  function showOverflow() {
    socialButtonUl.addClass("is-expanded").removeClass("is-collapsed");
  }

  function socialMoreInit() {
    socialButtonUl.addClass("is-expanded");
    if (windowWidth >= 768) {
      overflowSwitch();
    }
  }

  function revealBtnHandler() {
    var socialMoreButton = $("#menu-social-items + .button-dropdown");

    socialButtonUl.addClass("is-collapsed");
    socialMoreButton.attr("aria-expanded", "false");

    socialMoreButton.on("click", function () {
      if (socialButtonUl.hasClass("is-collapsed")) {
        socialMoreButton.attr("aria-expanded", "true");
        socialMoreButton.attr(
          "aria-label",
          "Collapse social media button panel",
        );
        socialButtonUl.addClass("is-expanded social-panel-expand");
        socialButtonUl.removeClass("is-collapsed");
      } else {
        socialMoreButton.attr("aria-expanded", "false");
        socialMoreButton.attr("aria-label", "Expand social media button panel");
        socialButtonUl.addClass("is-collapsed");
        socialButtonUl.removeClass("is-expanded social-panel-expand");
      }
    });
    //console.log( socialMoreButton );
  }

  function overflowSwitch() {
    var socialMoreButton = $("#menu-social-items + .button-dropdown");
    if (socialPanel.width() === 200) {
      socialButtonUl.width(164); // Social media ul width minus width of .menu-down-arrow button, styled to 36 x 36 px
      hideOverflow();
      socialMoreButton.css("display", "inline-block");
    } else if (socialPanel.width() === 280) {
      socialButtonUl.width(280);
      showOverflow();
      socialMoreButton.css("display", "none");
    } else {
      socialButtonUl.width("auto");
      socialMoreButton.css("display", "none");
    }
  }

  var resizeId;

  $(window).on("load", revealBtnHandler);
  $(window).on("load", socialMoreInit);
  $(window).resize(function () {
    clearTimeout(resizeId);
    resizeId = setTimeout(socialMoreInit, 500);
  });
})(jQuery); // ends function

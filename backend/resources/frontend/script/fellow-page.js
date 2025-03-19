(function () {
    window.addEventListener("scroll", onWindowScroll);

    function removeSidebarCurrent() {
        document.querySelectorAll(".fellowship-sidebar > ul > li").forEach((item) => {
            item.classList.remove("active")
        })
    }

    const isHidden = (element) => {
        const style = window.getComputedStyle(element);
        return style.display === 'none'
    }

    function onWindowScroll() {
        const scroll = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;

        document.querySelectorAll(".fellowship-sidebar > ul > li").forEach((item) => {
            const targetElement = document.querySelector(item.getAttribute("data-for-title"));

            if (!!targetElement && !isHidden(targetElement)) {
                const elementPosition = targetElement.offsetTop;

                if (
                    elementPosition <= scroll &&
                    elementPosition + targetElement.clientHeight > scroll
                ) {
                    removeSidebarCurrent()
                    item.classList.add("active")
                } else {
                    item.classList.remove("active")
                }
            }
        });
    }

    document.querySelectorAll(".fellowship-sidebar > ul > li").forEach(($menuItem) => {
        $menuItem.addEventListener("click", function (e) {
            e.preventDefault();

            removeSidebarCurrent();
            this.parentNode.classList.add("current");

            const targetSection = this.getAttribute("data-for-title");
            const element = document.querySelector(targetSection);
            const scrollTargetOffset =
                element.getBoundingClientRect().top + window.pageYOffset;

            window.scrollTo({ top: scrollTargetOffset, behavior: "smooth" });
        });
    });

    document.querySelectorAll(".content-readmore-toggle").forEach(($toggle) => {
        const visibleLine = $toggle.previousElementSibling.getAttribute("data-visible-line");
        const contentStyle = window.getComputedStyle($toggle.previousElementSibling);
        const originHeight = contentStyle.height;
        const lineHeight = contentStyle.lineHeight.replace('px', '');
        $toggle.previousElementSibling.setAttribute('data-origin-height', originHeight);
        $toggle.previousElementSibling.style.height = `${Number(visibleLine) * Number(lineHeight)}px`;

        $toggle.addEventListener("click", function (e) {
            e.preventDefault();

            if ($toggle.classList.contains("active")) {
                $toggle.previousElementSibling.style.height = `${Number(visibleLine) * Number(lineHeight)}px`;
                $toggle.parentElement.classList.remove("active");
                $toggle.classList.remove("active");
            } else {
                $toggle.previousElementSibling.style.height = $toggle.previousElementSibling.getAttribute("data-origin-height");
                $toggle.parentElement.classList.add("active");
                $toggle.classList.add("active");
            }
        })
    })

    $('.faq-list__item__toggle').on("click", function (e) {
        $(this).next().slideToggle();
        $(this).parent().toggleClass('open')
    })
}());
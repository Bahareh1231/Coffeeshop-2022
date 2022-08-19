jQuery(document).ready(function($) {

    // init fancybox
    $("a.fancybox").fancybox({
        centerOnScroll: true,
    });

    // view drone video
    $('.drone-button').on('click', function(e) {
        e.preventDefault();
        let film = $('.video-embed.film')
        let drone = $('.video-embed.drone')
        $(film).css('transform', 'translateY(30px)')
        setTimeout(() => {
            $(film).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(film).css('display', 'none');
            $(drone).css({
                'display': 'flex',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(drone).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.film-button').removeClass('active-button')
    })

    // view film video
    $('.film-button').on('click', function(e) {
        e.preventDefault();
        let film = $('.video-embed.film')
        let drone = $('.video-embed.drone')

        $(drone).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(drone).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(drone).css('display', 'none');
            $(film).css({
                'display': 'flex',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(film).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.drone-button').removeClass('active-button')
    })

    // view web team
    $('.view-web-team').on('click', function(e) {
        e.preventDefault();
        let film = $('.film-team');
        let web = $('.web-team');

        $(film).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(film).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(film).css('display', 'none');
            $(web).css({
                'display': 'block',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(web).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.view-film-team').removeClass('active-button')
    })

    // view film team
    $('.view-film-team').on('click', function(e) {
        e.preventDefault();
        let film = $('.film-team');
        let web = $('.web-team');

        $(web).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(web).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(web).css('display', 'none');
            $(film).css({
                'display': 'block',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(film).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.view-web-team').removeClass('active-button')

    })

    // view web services
    $('.web-button').on('click', function(e) {
        e.preventDefault();
        let video = $('.video-service');
        let web = $('.web-service');

        $(video).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(video).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(video).css('display', 'none');
            $(web).css({
                'display': 'block',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(web).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.video-button').removeClass('active-button')

    })

    // view video services
    $('.video-button').on('click', function(e) {
        e.preventDefault();
        let video = $('.video-service');
        let web = $('.web-service');

        $(web).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(web).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(web).css('display', 'none');
            $(video).css({
                'display': 'block',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(video).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.web-button').removeClass('active-button')

    })

    // view web works
    $('.web-work-button').on('click', function(e) {
        e.preventDefault();
        let film = $('.film-works');
        let web = $('.web-works');

        $(film).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(film).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(film).css('display', 'none');
            $(web).css({
                'display': 'block',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(web).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.film-work-button').removeClass('active-button')

    })

    // view film works
    $('.film-work-button').on('click', function(e) {
        e.preventDefault();
        let film = $('.film-works');
        let web = $('.web-works');

        $(web).css('transform', 'translateY(50px)')
        setTimeout(() => {
            $(web).css('opacity', 0 )
        }, 100)
        setTimeout(() => {
            $(web).css('display', 'none');
            $(film).css({
                'display': 'block',
                'opacity': 1
            })
        }, 500)
        setTimeout(() => {
            $(film).css('transform', 'translateY(0)')
        }, 510)

        $(this).addClass('active-button');
        $('.web-work-button').removeClass('active-button')

    })

    // view more film
    $('.view-more-film').on('click', function(e) {
        e.preventDefault();
        $('.film-work-item').css('display', 'flex');
        setTimeout(() => {
            $('.film-work-item').css('opacity', 1);
        })

        $(this).css('display', 'none');
    })

  // view more web
  $('.view-more-web').on('click', function(e) {
    e.preventDefault();
    $('.web-work-item').css('display', 'flex');
    setTimeout(() => {
        $('.web-work-item').css('opacity', 1);
    })

    $(this).css('display', 'none');
    })
});
<template>
  <div>
    <header class="header-global">
      <base-nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom headroom--not-bottom headroom--not-top headroom--pinned"
                transparent
                type
                effect="light"
                expand>
        <nuxt-link slot="brand" :to="$i18n.path('')" class="navbar-brand mr-lg-5">
          <img src="/argon/img/brand/white.png">
        </nuxt-link>

        <div slot="content-header" slot-scope="{closeMenu}" class="row" >
          <div class="col-6 collapse-brand">
            <nuxt-link :to="$i18n.path('')">
              <img src="/argon/img/brand/blue.png">
            </nuxt-link>
          </div>
          <div class="col-6 collapse-close">
            <close-button @click="closeMenu"></close-button>
          </div>
        </div>

        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <base-dropdown class="nav-item" menu-classes="dropdown-menu-xl">
            <a slot="title"
               role="button"
               href="#"
               class="nav-link"
               data-toggle="dropdown">
              <i class="ni ni-align-left-2 d-lg-none"></i>
              <span class="nav-link-inner--text">{{ $t('navbar.wedding.type') }}</span>
            </a>
            <div class="dropdown-menu-inner">
              <nuxt-link
                :to="$i18n.path('wedding-service')"
                class="media d-flex align-items-center"
              >
                <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                  <i class="ni ni-collection"></i>
                </div>
                <div class="media-body ml-3">
                  <h6 class="heading text-primary mb-md-1">{{ $t('navbar.wedding.service') }}</h6>
                  <p class="description d-none d-md-inline-block mb-0">
                    {{ $t('navbar.wedding.service_content') }}
                  </p>
                </div>
              </nuxt-link>
              <nuxt-link
                :to="$i18n.path('outside-wedding-service')"
                class="media d-flex align-items-center"
              >
                <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                  <i class="fa fa-cloud"></i>
                </div>
                <div class="media-body ml-3">
                  <h5 class="heading text-warning mb-md-1">{{ $t('navbar.wedding.outside_service') }}</h5>
                  <p class="description d-none d-md-inline-block mb-0">
                    {{ $t('navbar.wedding.outside_service_content') }}
                  </p>
                </div>
              </nuxt-link>
            </div>
          </base-dropdown>
          <base-dropdown class="nav-item" menu-classes="dropdown-menu-xl">
            <a slot="title"
               role="button"
               href="#"
               class="nav-link"
               data-toggle="dropdown">
              <i class="ni ni-align-left-2 d-lg-none"></i>
              <span class="nav-link-inner--text">{{ $t('navbar.event.type') }}</span>
            </a>
            <div class="dropdown-menu-xl">
              <div class="dropdown-menu-inner">
                <nuxt-link
                  :to="$i18n.path('friendship-workshop')"
                  class="media d-flex align-items-center"
                >
                  <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                    <i class="ni ni-spaceship"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-primary mb-md-1">{{ $t('navbar.event.workshop') }}</h6>
                    <p class="description d-none d-md-inline-block mb-0">
                      {{ $t('navbar.event.workshop_content') }}
                    </p>
                  </div>
                </nuxt-link>
                <nuxt-link
                  :to="$i18n.path('customer-gratitude')"
                  class="media d-flex align-items-center"
                >
                  <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                    <i class="ni ni-user-run"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h5 class="heading text-warning mb-md-1">{{ $t('navbar.event.customer_gratitude') }}</h5>
                    <p class="description d-none d-md-inline-block mb-0">
                      {{ $t('navbar.event.customer_gratitude_content') }}
                    </p>
                  </div>
                </nuxt-link>
                <nuxt-link
                  :to="$i18n.path('birthday')"
                  class="media d-flex align-items-center"
                >
                  <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                    <i class="ni ni-tie-bow"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h5 class="heading text-primary mb-md-1">{{ $t('navbar.event.birthday') }}</h5>
                    <p class="description d-none d-md-inline-block mb-0">
                      {{ $t('navbar.event.birthday_content') }}
                    </p>
                  </div>
                </nuxt-link>
                <nuxt-link
                  :to="$i18n.path('music-fashion')"
                  class="media d-flex align-items-center"
                >
                  <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                    <i class="ni ni-note-03"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h5 class="heading text-warning mb-md-1">{{ $t('navbar.event.music_fashion') }}</h5>
                    <p class="description d-none d-md-inline-block mb-0">
                      {{ $t('navbar.event.music_fashion_content') }}
                    </p>
                  </div>
                </nuxt-link>
                <nuxt-link
                  :to="$i18n.path('outside-catering')"
                  class="media d-flex align-items-center"
                >
                  <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                    <i class="ni ni-planet"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h5 class="heading text-primary mb-md-1">{{ $t('navbar.event.outside_catering') }}</h5>
                    <p class="description d-none d-md-inline-block mb-0">
                      {{ $t('navbar.event.outside_catering_content') }}
                    </p>
                  </div>
                </nuxt-link>
              </div>
            </div>
          </base-dropdown>
          <li class="nav-item">
            <nuxt-link role="button"
                       to="/abc"
                       class="nav-link">
              <i class="fa fa-gift d-lg-none"></i>
              <span class="nav-link-inner--text">{{ $t('navbar.gift.type') }}</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link :to="$i18n.path('menu')"
                       role="button"
                       class="nav-link">
              <i class="fa fa-list d-lg-none"></i>
              <span class="nav-link-inner--text">{{ $t('navbar.menu.type') }}</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link role="button"
                       to="/abc"
                       class="nav-link">
              <i class="fa fa-newspaper-o d-lg-none"></i>
              <span class="nav-link-inner--text">{{ $t('navbar.news.type') }}</span>
            </nuxt-link>
          </li>
        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a
              class="nav-link nav-link-icon"
              href="https://www.facebook.com/quanghung997"
              target="_blank"
              data-toggle="tooltip"
              title="Like us on Facebook"
            >
              <i class="fa fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link nav-link-icon"
              href="https://www.instagram.com/hungcan197"
              target="_blank"
              data-toggle="tooltip"
              title="Follow us on Instagram"
            >
              <i class="fa fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link nav-link-icon"
              href="https://twitter.com"
              target="_blank"
              data-toggle="tooltip"
              title="Follow us on Twitter"
            >
              <i class="fa fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block ml-lg-1">
            <nuxt-link
              :to="$i18n.path('order-now')"
              class="btn btn-neutral btn-icon"
            >
              <span class="btn-inner--icon">
                <i class="fa fa-mouse-pointer mr-2"></i>
              </span>
              <span class="nav-link-inner--text">{{ $t('navbar.order_now.type') }}</span>
            </nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link v-if="$i18n.locale === 'vi'"
                       :to="`/en` + $route.fullPath"
                       class="nav-link"
                       active-class="none"
                       exact>
              <span class="nav-link-inner--text">{{ $t('links.english') }}</span>
            </nuxt-link>
            <nuxt-link v-else
                       :to="$route.fullPath.replace(/^\/[^\/]+/, '')"
                       class="nav-link"
                       active-class="none"
                       exact>
              <span class="nav-link-inner--text">{{ $t('links.vietnamese') }}</span>
            </nuxt-link>
          </li>
        </ul>
      </base-nav>
    </header>
    <main>
      <nuxt/>
    </main>
    <footer class="footer has-cards">
      <div class="container container-lg">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <div class="card card-lift--hover shadow border-0">
              <nuxt-link to="/" title="Tiệc cỗ bắt mắt">
                <img v-lazy="'/argon/img/theme/slider1.jpg'" class="card-img">
              </nuxt-link>
            </div>
          </div>
          <div class="col-md-6 mb-5 mb-lg-0">
            <div class="card card-lift--hover shadow border-0">
              <nuxt-link to="/" title="Sang chảnh thưởng trà đẳng cấp">
                <img v-lazy="'/argon/img/theme/slider2.jpg'" class="card-img">
              </nuxt-link>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row row-grid align-items-center my-md">
          <div class="col-lg-6">
            <h3 class="text-primary font-weight-light mb-2">{{ $t('footer.thank') }}</h3>
            <h4 class="mb-0 font-weight-light">{{ $t('footer.contact') }}</h4>
          </div>
          <div class="col-lg-6 text-lg-center btn-wrapper">
            <a
              target="_blank"
              href="https://twitter.com"
              class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg"
              data-toggle="tooltip"
              data-original-title="Follow us"
            >
              <i class="fa fa-twitter"></i>
            </a>
            <a
              target="_blank"
              href="https://www.facebook.com/hungcan997"
              class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg"
              data-toggle="tooltip"
              data-original-title="Like us"
            >
              <i class="fa fa-facebook-square"></i>
            </a>
            <a
              target="_blank"
              href="https://dribbble.com"
              class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round"
              data-toggle="tooltip"
              data-original-title="Follow us"
            >
              <i class="fa fa-dribbble"></i>
            </a>
          </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2019
              <a href="https://www.google.com" target="_blank">Quang Hung</a>.
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="https://www.google.com" class="nav-link" target="_blank">Quang Hung</a>
              </li>
              <li class="nav-item">
                <a
                  href="https://www.google.com"
                  class="nav-link"
                  target="_blank"
                >
                  {{ $t('footer.about') }}
                </a>
              </li>
              <li class="nav-item">
                <a href="http://blog.google.com" class="nav-link" target="_blank">{{ $t('footer.blog') }}</a>
              </li>
              <li class="nav-item">
                <a
                  href="https://www.google.com"
                  class="nav-link"
                  target="_blank"
                >{{ $t('footer.license') }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import BaseNav from '~/components/argon/BaseNav'
import BaseDropdown from '~/components/argon/BaseDropdown'
import CloseButton from '~/components/argon/CloseButton'

export default {
  components: {
    BaseNav,
    BaseDropdown,
    CloseButton
  }
}
</script>

<style>
</style>

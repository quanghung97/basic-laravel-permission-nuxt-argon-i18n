<template>
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <!-- Tabs with icons -->
      <div class="mb-3">
        <small class="text-white text-center">{{ $t('home.hero.tabs_section.title') }}</small>
      </div>
      <tabs fill class="flex-column flex-md-row">
        <card slot-scope="{ activeTabIndex }" shadow>
          <tab-pane key="tab1">
            <template slot="title">
              <i class="ni ni-shop mr-2"></i>{{ $t('home.hero.tabs_section.us') }}
            </template>

            <h4 class="description">
              {{ $t('home.hero.tabs_section.us_description') }}
            </h4>
          </tab-pane>

          <tab-pane key="tab2">
            <template slot="title">
              <i class="fa fa-history mr-2"></i>{{ $t('home.hero.tabs_section.history') }}
            </template>

            <h4 class="description">
              {{ $t('home.hero.tabs_section.history_description') }}
            </h4>
          </tab-pane>
        </card>
      </tabs>
    </div>
  </div>
</template>
<script>
import Tabs from '~/components/argon/Tabs/Tabs.vue'
import TabPane from '~/components/argon/Tabs/TabPane.vue'
export default {
  components: {
    Tabs,
    TabPane
  }
}
</script>
<style>
</style>

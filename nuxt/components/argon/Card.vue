<template>
  <div
    :class="[
      {'card-lift--hover': hover},
      {'shadow': shadow},
      {[`shadow-${shadowSize}`]: shadowSize},
      {[`bg-gradient-${gradient}`]: gradient},
      {[`bg-${type}`]: type}
    ]"
    class="card"
  >
    <div v-if="$slots.header" :class="headerClasses" class="card-header">
      <slot name="header"></slot>
    </div>
    <div v-if="!noBody" :class="bodyClasses" class="card-body" >
      <slot></slot>
    </div>

    <slot v-if="noBody"></slot>

    <div v-if="$slots.footer" :class="footerClasses" class="card-footer">
      <slot name="footer"></slot>
    </div>
  </div>
</template>
<script>
export default {
  name: 'card',
  props: {
    type: {
      type: String,
      description: 'Card type',
      default: undefined
    },
    gradient: {
      type: String,
      description: 'Card background gradient type (warning,danger etc)',
      default: undefined
    },
    hover: {
      type: Boolean,
      description: 'Whether card should move on hover',
      default: true
    },
    shadow: {
      type: Boolean,
      description: 'Whether card has shadow',
      default: true
    },
    shadowSize: {
      type: String,
      description: 'Card shadow size',
      default: undefined
    },
    noBody: {
      type: Boolean,
      default: false,
      description: 'Whether card should have wrapper body class'
    },
    bodyClasses: {
      type: [String, Object, Array],
      description: 'Card body css classes',
      default: undefined
    },
    headerClasses: {
      type: [String, Object, Array],
      description: 'Card header css classes',
      default: undefined
    },
    footerClasses: {
      type: [String, Object, Array],
      description: 'Card footer css classes',
      default: undefined
    }
  }
}
</script>
<style>
</style>

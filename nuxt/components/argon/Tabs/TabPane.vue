<template>
  <div
    v-show="active"
    :id="id || label"
    :class="{'active show': active}"
    :aria-expanded="active"
    class="tab-pane fade"
  >
    <slot></slot>
  </div>
</template>
<script>
export default {
  name: 'tab-pane',
  props: {
    label: {
      type: String,
      description: 'label',
      default: undefined
    },
    id: {
      type: Number,
      description: 'id',
      default: undefined
    },
    title: {
      type: String,
      description: 'title',
      default: undefined
    },
  },
  inject: ['addTab', 'removeTab'],
  data() {
    return {
      active: false
    }
  },
  mounted() {
    this.addTab(this)
  },
  destroyed() {
    if (this.$el && this.$el.parentNode) {
      this.$el.parentNode.removeChild(this.$el)
    }
    this.removeTab(this)
  }
}
</script>
<style>
</style>

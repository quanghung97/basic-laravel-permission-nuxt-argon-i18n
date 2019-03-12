<template>
  <button
    :data-target="target"
    :aria-controls="target"
    :aria-expanded="toggled"
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
</template>
<script>
export default {
  props: {
    target: {
      type: [String, Number],
      description: 'Button target element',
      default: undefined
    },
    toggled: {
      type: Boolean,
      default: false,
      description: 'Whether button is toggled'
    }
  }
}
</script>
<style>
</style>

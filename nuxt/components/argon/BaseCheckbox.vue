<template>
  <div :class="[{disabled: disabled}, inlineClass]" class="custom-control custom-checkbox">
    <input
      v-model="model"
      :id="cbId"
      :disabled="disabled"
      class="custom-control-input"
      type="checkbox"
    >
    <label :for="cbId" class="custom-control-label">
      <slot>
        <span v-if="inline">&nbsp;</span>
      </slot>
    </label>
  </div>
</template>
<script>
export default {
  name: 'base-checkbox',
  model: {
    prop: 'checked'
  },
  props: {
    checked: {
      type: [Array, Boolean],
      description: 'Whether checkbox is checked',
      default: false
    },
    disabled: {
      type: Boolean,
      description: 'Whether checkbox is disabled',
      default: false
    },
    inline: {
      type: Boolean,
      description: 'Whether checkbox is inline',
      default: false
    }
  },
  data() {
    return {
      cbId: '',
      touched: false
    }
  },
  computed: {
    model: {
      get() {
        return this.checked
      },
      set(check) {
        if (!this.touched) {
          this.touched = true
        }
        this.$emit('input', check)
      }
    },
    inlineClass() {
      if (this.inline) {
        return `form-check-inline`
      }
    }
  },
  mounted() {
    this.cbId = Math.random()
      .toString(16)
      .slice(2)
  }
}
</script>

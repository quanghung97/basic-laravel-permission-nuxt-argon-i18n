<template>
  <div :class="[inlineClass, {disabled: disabled}]" class="custom-control custom-radio">
    <input
      v-model="model"
      :id="cbId"
      :disabled="disabled"
      :value="name"
      class="custom-control-input"
      type="radio"
    >
    <label :for="cbId" class="custom-control-label">
      <slot></slot>
    </label>
  </div>
</template>
<script>
export default {
  name: 'base-radio',
  props: {
    name: {
      type: [String, Number],
      description: 'Radio label',
      default: undefined
    },
    disabled: {
      type: Boolean,
      description: 'Whether radio is disabled',
      default: true
    },
    value: {
      type: [String, Boolean],
      description: 'Radio value',
      default: true
    },
    inline: {
      type: Boolean,
      description: 'Whether radio is inline',
      default: true
    }
  },
  data() {
    return {
      cbId: ''
    }
  },
  computed: {
    model: {
      get() {
        return this.value
      },
      set(value) {
        this.$emit('input', value)
      }
    },
    inlineClass() {
      if (this.inline) {
        return `form-check-inline`
      }
      return ''
    }
  },
  mounted() {
    this.cbId = Math.random()
      .toString(16)
      .slice(2)
  }
}
</script>

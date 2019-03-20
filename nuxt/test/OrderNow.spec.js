import { shallowMount } from '@vue/test-utils'
import OrderNow from '@/pages/_lang/order-now'

describe('Logo', () => {
  test('is a Vue instance', () => {
    const wrapper = shallowMount(OrderNow, {
      mocks: {
        $t: () => ''
      }
    })
    console.log(wrapper)
    expect(wrapper.isVueInstance()).toBeTruthy()
  })
})

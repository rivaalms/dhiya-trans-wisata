/**
 * Format number to number currency
 * @param { number } price
 * @returns { string }
 */
export function useFormatCurrency(price) {
   return Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      maximumFractionDigits: 0
   }).format(price)
}

/**
 * Generate a slug
 * @param { String } string
 * @returns { string }
 */
export function useGenerateSlug(string) {
   return string
      .toLowerCase()
      .replace(/[^\w\s-]/g, '')
      .replace(/\s+/g, '-')
      .trim()
}

/**
 * Validate is Keyboard Event is a number
 *
 * If the keyboard event is not a number, cancel the input
 * @param { KeyboardEvent } event
 * @returns { void | Event }
 */
export function useValidateNumber (event) {
   if (!/^[0-9]+$/.test(event.key) || event.key === '.') return event.preventDefault()
}
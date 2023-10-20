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
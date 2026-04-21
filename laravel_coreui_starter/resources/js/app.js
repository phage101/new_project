import '@coreui/coreui'
import '@coreui/icons/css/all.min.css'
import 'simplebar'
import Chart from 'chart.js/auto'

const THEME_KEY = 'coreui-theme'

const resolveTheme = (mode) => {
  if (mode === 'auto') {
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  return mode
}

const applyTheme = (mode) => {
  const activeMode = mode || localStorage.getItem(THEME_KEY) || 'light'
  const resolved = resolveTheme(activeMode)

  document.documentElement.setAttribute('data-coreui-theme', resolved)
  localStorage.setItem(THEME_KEY, activeMode)

  document.querySelectorAll('[data-theme-value]').forEach((button) => {
    button.classList.toggle('active', button.getAttribute('data-theme-value') === activeMode)
  })
}

document.addEventListener('DOMContentLoaded', () => {
  applyTheme()

  document.querySelectorAll('[data-theme-value]').forEach((button) => {
    button.addEventListener('click', () => {
      applyTheme(button.getAttribute('data-theme-value'))
    })
  })

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    if ((localStorage.getItem(THEME_KEY) || 'light') === 'auto') {
      applyTheme('auto')
    }
  })

  const mainChartElement = document.getElementById('main-chart')
  if (mainChartElement) {
    new Chart(mainChartElement, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
          {
            label: 'Visits',
            data: [12, 19, 13, 25, 22, 31, 28],
            borderColor: '#321fdb',
            tension: 0.35,
            fill: false,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
      },
    })
  }

  const chartsPageCanvas = document.getElementById('charts-page-canvas')
  if (chartsPageCanvas) {
    new Chart(chartsPageCanvas, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [
          {
            label: 'Revenue',
            data: [12, 19, 10, 24, 16, 21],
            backgroundColor: '#5856d6',
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
      },
    })
  }
})

import './bootstrap';

document.getElementById('generateForm').addEventListener('submit', async function (e) {
    e.preventDefault()

    const businessType = document.getElementById('businessType').value.trim()
    const location     = document.getElementById('location').value.trim()
    const btn          = document.getElementById('generateBtn')
    const loading      = document.getElementById('loading')
    const output       = document.getElementById('scriptsOutput')

    if (!businessType || !location) return

    btn.disabled = true
    btn.textContent = 'Generating...'
    loading.classList.remove('hidden')
    output.innerHTML = ''

    try {
        const res = await fetch('/api/scripts/generate', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ business_type: businessType, location })
        })

        const data = await res.json()

        data.scripts.forEach(script => {
            const platformColors = {
                tiktok:   'bg-black text-white',
                reels:    'bg-pink-500 text-white',
                whatsapp: 'bg-green-500 text-white',
            }

            const badge = platformColors[script.platform] || 'bg-gray-200 text-gray-700'

            output.innerHTML += `
                <div class="bg-white rounded-2xl border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-medium px-3 py-1 rounded-full ${badge} capitalize">${script.platform}</span>
                        <button onclick="exportScript(${script.id})"
                            class="text-xs text-green-600 border border-green-200 px-3 py-1 rounded-full hover:bg-green-50 transition">
                            Export
                        </button>
                    </div>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Hook</p>
                    <p class="text-gray-800 font-medium mb-3">${script.hook}</p>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Body</p>
                    <p class="text-gray-600 text-sm mb-3">${script.body}</p>
                    <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">CTA</p>
                    <p class="text-gray-800 text-sm mb-4">${script.cta}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        ${script.overlay_texts.map(t => `<span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">${t}</span>`).join('')}
                    </div>
                    <a href="${script.peira_link}" target="_blank"
                        class="text-xs text-green-600 underline">${script.peira_link}</a>
                </div>
            `
        })
    } catch (err) {
        output.innerHTML = '<p class="text-red-500 text-sm">Something went wrong. Try again.</p>'
    } finally {
        btn.disabled = false
        btn.textContent = 'Generate Scripts'
        loading.classList.add('hidden')
    }
})

async function exportScript(id) {
    const res  = await fetch(`/api/scripts/${id}/export`)
    const data = await res.json()
    const blob = new Blob([data.text], { type: 'text/plain' })
    const url  = URL.createObjectURL(blob)
    const a    = document.createElement('a')
    a.href     = url
    a.download = `script-${id}.txt`
    a.click()
}
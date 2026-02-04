document.addEventListener("DOMContentLoaded", () => {
  console.log("Donor Perfect system loaded");
});
const campaignForm = document.getElementById("campaignForm");

if (campaignForm) {
  campaignForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const title = campaignForm.querySelector("input[type='text']").value;
    const amount = campaignForm.querySelector("input[type='number']").value;

    if (title === "" || amount === "") {
      alert("Please fill in all required fields");
      return;
    }

    if (amount <= 0) {
      alert("Target amount must be greater than zero");
      return;
    }

    alert("Campaign created successfully (demo)");
    campaignForm.reset();
  });
}
document.addEventListener("DOMContentLoaded", () => {

  const statuses = document.querySelectorAll(".status");

  statuses.forEach(status => {
    if (status.innerText === "Pending") {
      status.style.color = "orange";
      status.style.fontWeight = "bold";
    } 
    else if (status.innerText === "Collected") {
      status.style.color = "blue";
      status.style.fontWeight = "bold";
    } 
    else if (status.innerText === "Disbursed") {
      status.style.color = "green";
      status.style.fontWeight = "bold";
    }
  });

});
function logAction(action, user, description) {
  console.log(`[AUDIT] ${action} | ${user} | ${description}`);
}
logAction(
  "CREATE_CAMPAIGN",
  "Admin",
  "New campaign created successfully"
);
const totalCampaigns = document.getElementById("totalCampaigns");
const totalDonations = document.getElementById("totalDonations");

if (totalCampaigns && totalDonations) {
  totalCampaigns.innerText = "8 Active";
  totalDonations.innerText = "KES 1,250,000";
}

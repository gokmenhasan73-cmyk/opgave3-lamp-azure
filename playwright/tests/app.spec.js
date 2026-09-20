import { test, expect } from '@playwright/test';

test('Webserveren svarer', async ({ page }) => {
  await page.goto('/');
  await expect(page.locator('h1')).toContainText('Opgave 3 - LAMP i Azure');
});

test('Apache og PHP virker', async ({ page }) => {
  await page.goto('/');
  await expect(page.getByText('Apache og PHP virker!')).toBeVisible();
});

test('MariaDB forbindelse virker', async ({ page }) => {
  await page.goto('/');
  await expect(page.getByText('MariaDB forbindelse virker!')).toBeVisible();
});
